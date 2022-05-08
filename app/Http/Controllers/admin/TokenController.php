<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Counter;
use App\Models\admin\CounterDepartment;
use App\Models\admin\Token;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokens = Token::latest()->get();
        return view('admin.dashboard.token.index', compact('tokens'));
    }

    public function generate($department)
    {
        $department = Department::find($department);
        // generating a random token
        // creating new token
        $token = new Token();
        $token->token = generate_token();
        $token->department_id = $department->id;
        // checking the free counter in this department
        $countersDepartment = CounterDepartment::where('department_id', $department->id)->get();
        foreach ($countersDepartment as $countDepart) {
            Log::info("First Loop Start");
            if ($countDepart->counter->status == 'active') {
                Log::info("Active Coutner Pickup");
                // checking if this counter has a user
                $userCounter = User::where('counter', $countDepart->counter->id)->first();
                Log::info($countDepart->counter->id . " Counter ID");
                if ($userCounter) {
                    // free active counter found
                    // assign this token to this counter
                    $token->counter_id = $countDepart->counter->id;
                    $token->save();
                    // update the counter status to busy
                    $countDepart->counter->status = 'busy';
                    $countDepart->counter->save();

                    goto endLooping;
                }
            }
            Log::info('NO Active Counter Found, or end of the foreach loop');
        }
        foreach ($countersDepartment as $countDepart) {
            Log::info("2nd Loop Start");
            if ($countDepart->counter->status == 'busy') {
                Log::info("Busy Counter Pickup");
                // putting this counter in the queue
                $userCounter = User::where('counter', $countDepart->counter->id)->first();
                if ($userCounter) {
                    // free active counter found
                    // assign this token to this counter
                    $token->counter_id = $countDepart->counter->id;
                    $token->status = 'queue';
                    $token->save();
                    break;
                } else {
                    return redirect()->back()->withErrors('No user found in this counter');
                }
            }
        }

        endLooping:

        return view('admin.dashboard.token.print', compact('token', 'department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.dashboard.token.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $token = Token::find($id);
        $departments = Department::all();
        $counters = Counter::all();
        return view('admin.dashboard.token.edit', compact('token', 'departments', 'counters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'token' => 'required|unique:tokens,token,' . $id,
            'department_id' => 'required',
            'status' => 'required',
            'counter_id' => 'required',
        ]);

        $token = Token::find($id);
        $token->token = $validatedData['token'];
        $token->department_id = $request->department_id;
        $token->status = $validatedData['status'];
        $token->counter_id = $validatedData['counter_id'];
        $token->save();

        return redirect()->route('admin.token.index')->with('success', 'Token updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
