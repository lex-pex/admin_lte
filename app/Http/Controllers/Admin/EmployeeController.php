<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function index(Request $request) {

        $employees = Employee::latest()->get();

        if(request()->ajax()) {
            return datatables()->of($employees) /*
                ->addColumn('action', function($data) {
                $button =
                    '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= ' | ';
                $button .=
                    '<button type="button" name="delete" id="'. $data->id .'" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            }) */
                ->rawColumn(['action'])
                ->make(true);
        }
/*
        if ($request->ajax()) {

            $data = User::latest()->get();

            return Datatables::of($data)

                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                        return '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
//        return view('users'); */

        return view('admin.examples.table');

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
