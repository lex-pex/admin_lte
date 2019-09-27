<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::all()->load('post')->sortByDesc('id');
        if($request->ajax()) {
            return datatables()->of($employees)
                ->addColumn('action', function($data) {
                    $button =
                        '<a target="_parent" href="/staff/'. $data->id .'/edit" class="edit btn btn-outline-primary btn-sm"> &nbsp; Edit &nbsp; </a><hr/>';
                    $button .=
                        ' <span onclick="deleteEmployee(' . $data->id . ', \'' . $data->name . '\')" class="delete btn btn-outline-danger btn-sm">Delete</span>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.employees.staff_table')->withPageHeader('Employees')->withDescription('Staff List');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.add')->withPageHeader('Employees')->withDescription('Add a New Employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('Staff . Store ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('Staff . Show ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!is_numeric($id)) abort(404);
        if(!$item = Employee::find($id)) abort(404);
        return view('admin.employees.edit',
            [
                'item' => $item
            ])->withPageHeader('Employee')->withDescription('Edit');
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
        dd('Staff . Update ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = Employee::findOrFail($id);
        $e->delete();
    }
}
