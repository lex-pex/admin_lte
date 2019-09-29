<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Models\Position;
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
                        '<span onclick="deleteEmployee(' . $data->id . ', \'' . $data->name . '\')" class="delete btn btn-outline-danger btn-sm">Delete</span>';
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
        $positions = Position::all();
        return view('admin.employees.add',
            [
                'positions' => $positions
            ]
        )->withPageHeader('Employees')->withDescription('Add a New Employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//          'image', 'name', 'phone', 'email', 'position', 'salary', 'head', 'hire_date'

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:3|max:250',
            'phone' => 'required|min:50|max:500',
            'email' => 'required|min:50|max:500',
            'position' => 'required|min:1|max:10',
            'salary' => 'required|min:1000|max:1200000',
            'salary' => 'required|min:1000|max:1200000',
        ]);
        $data = $request->except('_token', 'image');
        $ad = new Ad();
        $ad->fill($data);
        $ad->user_id = Auth::user()->id;
        if ($file = $request->image) {
            $this->imageSave($file, $ad);
        }
        $ad->save();
        return redirect(route('adShow', $ad->id));
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

    /**
     * Remove the specified resource from storage.
     *
     * @return string
     */
    public function hint()
    {
//        echo 'hint ' . $_POST['str'];

        echo ['First Name', 'Second Name', 'Third Name'];

        return;
    }

}
