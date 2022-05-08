<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Token;
use App\Models\Department;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokens = Token::get();
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
        $token->save();

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
        return view('admin.dashboard.token.edit', compact('token', 'departments'));
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
            'token' => 'required|unique:tokens',
            'department_id' => 'required',
            'status' => 'required',
        ]);

        $token = Token::find($id);
        $token->token = $validatedData['token'];
        $token->department_id = $request->department_id;
        $token->status = $validatedData['status'];
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
