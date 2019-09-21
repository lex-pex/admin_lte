<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {

        return view('admin.employees')->withPageHeader('Employees')->withDescription('Admin Panel Main Page');
    }

    public function login() {

        return view('login.login')->withPageHeader('Admin Login Page');
    }

    public function demo() {
        return view('admin.examples.demo');
    }
}
