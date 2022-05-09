<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Counter;
use App\Models\admin\CounterDepartment;
use App\Models\Department;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counters = Counter::all();
        return view('admin.dashboard.counter.index', compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.dashboard.counter.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:counters',
            'description' => 'required',
        ]);

        $counter = new Counter();
        $counter->name = $validatedData['name'];
        $counter->description = $validatedData['description'];
        $counter->save();


        // permission management
        $departments = $request->only([
            'department_1', 'department_2', 'department_3', 'department_4', 'department_5', 'department_6', 'department_7', 'department_8', 'department_9', 'department_10', 'department_11', 'department_12',
        ]);

        // update or create this user
        foreach ($departments as $depart) {
            if ($depart != null) {
                $department = CounterDepartment::updateOrCreate([
                    'counter_id' => $counter->id,
                    'department_id' => $depart,
                ]);
            }
        }

        return redirect()->route('admin.counter.index')->with('success', 'Counter created successfully');
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
        $counter = Counter::find($id);
        $departments = Department::all();
        $counter_departments = CounterDepartment::where('counter_id', $id)->get();
        return view('admin.dashboard.counter.edit', compact('counter', 'departments', 'counter_departments'));
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
            'name' => 'required|unique:counters,name,' . $id,
            'description' => 'required',
        ]);


        // permission management
        $departments = $request->only([
            'department_1', 'department_2', 'department_3', 'department_4', 'department_5', 'department_6', 'department_7', 'department_8', 'department_9', 'department_10', 'department_11', 'department_12',
        ]);

        $counter = Counter::find($id);
        // update or create this user
        foreach ($departments as $depart) {
            if ($depart != null) {
                $department = CounterDepartment::updateOrCreate([
                    'counter_id' => $counter->id,
                    'department_id' => $depart,
                ]);
            }
        }
        $counter->name = $validatedData['name'];
        $counter->description = $validatedData['description'];
        $counter->save();

        return redirect()->route('admin.counter.index')->with('success', 'Counter updated successfully');
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
