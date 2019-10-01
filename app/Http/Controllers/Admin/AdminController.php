<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.employees.staff')->withPageHeader('Employees')->withDescription('Staff List');
    }

    public function login() {
        return view('login.login')->withPageHeader('Admin Login Page');
    }

    public function demo() {
        return view('admin.examples.demo');
    }
}
