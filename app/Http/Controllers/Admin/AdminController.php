<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers;

class AdminController extends Controller
{
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
