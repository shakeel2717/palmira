<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Counter;
use App\Models\admin\DepartmentControl;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::get();
        return view('admin.dashboard.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::get();
        $counters = Counter::get();
        return view('admin.dashboard.employee.create', compact('departments'), compact('counters'));
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required|string|max:255',
            'password' => 'required|min:6',
            'counter_id' => 'required|integer',
        ]);

        $departments = $request->only([
            'department_1', 'department_2', 'department_3', 'department_4', 'department_5', 'department_6', 'department_7', 'department_8', 'department_9', 'department_10', 'department_11', 'department_12',
        ]);


        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];
        $user->counter = $validatedData['counter_id'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        foreach ($departments as $depart) {
            if ($depart != null) {
                $department = new DepartmentControl();
                $department->user_id = $user->id;
                $department->department_id = $depart;
                $department->save();
            }
        }

        return redirect()->back()->with('success', 'Employee created successfully');
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
        $employee = User::find($id);
        $departments = Department::get();
        $departmentControl = DepartmentControl::where('user_id', $id)->get();
        return view('admin.dashboard.employee.edit', compact('employee', 'departments', 'departmentControl'));
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'nullable|string|max:255',
            'password' => 'nullable|min:6',
        ]);


        $user = User::find($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if ($validatedData['role']) {
            $user->role = $validatedData['role'];
        }
        if ($validatedData['password']) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->save();

        // permission management
        $departments = $request->only([
            'department_1', 'department_2', 'department_3', 'department_4', 'department_5', 'department_6', 'department_7', 'department_8', 'department_9', 'department_10', 'department_11', 'department_12',
        ]);

        // update or create this user
        foreach ($departments as $depart) {
            if ($depart != null) {
                $department = DepartmentControl::updateOrCreate([
                    'user_id' => $user->id,
                    'department_id' => $depart,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Employee updated successfully');
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
