<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Counter;
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
        $counters = Counter::get();
        return generate_token();
        return view('admin.dashboard.index', compact('employees', 'departments', 'tokens', 'counters'));
    }
}
