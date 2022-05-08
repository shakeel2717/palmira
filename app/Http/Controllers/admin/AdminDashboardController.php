<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Token;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $employees = User::get();
        $departments = Department::get();
        $tokens = Token::get();
        return view('admin.dashboard.index', compact('employees', 'departments', 'tokens'));
    }
}
