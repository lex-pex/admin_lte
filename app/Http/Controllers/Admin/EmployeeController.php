<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function index() {

//        $e = Employee::find(100);
//        $e = Employee::with( 'position' ) -> where('id', 100) -> get();
//        $e->load('post');

        $e = Employee::all()->where('id', '<', 5)->load('post');
        dd($e);
//        return view('admin.examples.table');
    }

    public function show(int $id) {
        if(!$id) abort(404);
        return view('admin.employees.show')->withPageHeader('Employees')->withDescription('Employee');
    }

    public function create() {
        return view('admin.employees.add')->withPageHeader('Employees')->withDescription('Add a New Employee');
    }

    public function store(Request $request) {
        return view('admin.employees.add')->withPageHeader('Employees')->withDescription('Add a New Employee');
    }

    public function edit(int $id) {
        if(!$id) abort(404);

        return view('admin.employees.edit')->withPageHeader('Employees')->withDescription('Edit the Employee');
    }

    public function update(Model $item, Request $request) {
        return view('admin.employees.edit')->withPageHeader('Employees')->withDescription('Edit the Employee');
    }

    public function destroy() {
        return view('admin.employees.deleteAlert')->withPageHeader('Employees')->withDescription('Edit the Employee');
    }

}
