<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class StaffController extends Controller
{
    /**
     * Folder Path for store images
     * @var string
     */
    private $folder = 'img/staff';

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
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:3|max:150',
            'phone' => 'required|min:9|max:20',
            'email' => 'required|min:10|max:150',
            'position' => 'required|min:1|max:10',
            'salary' => 'integer|min:1000|max:1200000',
            'hire_date' => 'required|date',
        ]);
        $head = $request->head;
        if($head == 0) {
            $employee = Employee::where('name', $request->head_name)->first();
            if($employee)
                $head = $employee->id;
            else
                return redirect()->back()->withErrors('There is not such Employee to make Head');
        }

        $data = $request->except('_token', 'image');
        $e = new Employee();
        $e->fill($data);
        $e->head = $head;
        if ($file = $request->image) {
            $this->imageSave($file, $e);
        }
        $e->save();
        return redirect(route('staff.show', $e->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$item = Employee::find($id)->load('post')) abort(404);
        $head = Employee::find($item->head);
        return view('admin.employees.show',
            [
                'item' => $item,
                'head' => $head,
            ]
        )->withPageHeader('Employees')->withDescription('Employee Card');
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
        $positions = Position::all();
        $head = Employee::find($item->head);
        return view('admin.employees.edit',
            [
                'item' => $item,
                'positions' => $positions,
                'head' => $head
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
        if(!$item = Employee::find($id)) abort(404);
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:3|max:150',
            'phone' => 'required|min:9|max:20',
            'email' => 'required|min:10|max:150',
            'position' => 'required|min:1|max:10',
            'salary' => 'integer|min:1000|max:1200000',
            'hire_date' => 'required|date',
        ]);
        $head = $request->head;
        if($head != $item->head) {
            if($head == 0) {
                $employee = Employee::where('name', $request->head_name)->first();
                if($employee)
                    $head = $employee->id;
                else
                    return redirect()->back()->withErrors('There is not such Employee to make Head');
            }
        }


        $data = $request->except('_token', 'image');
        $e = new Employee();
        $e->fill($data);
        $e->head = $head;
        if ($file = $request->image) {
            $this->imageSave($file, $e);
        }
        $e->save();
        return redirect(route('staff.show', $e->id));
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
        echo Employee::select('id', 'name')->limit(15)->where('name', 'like', $_POST['x'] . '%')->get()->toJson();
        return;
    }

    // _________ Private Helpers: _________

    private function imageSave(UploadedFile $file, Employee $e) {
        if($p = $e->image)
            $this->imageDelete($p);
        $dateName = date('dmyHis');
        $name = $dateName . '.' . $file->getClientOriginalExtension();
        $file->move($this->folder, $name);
        $e->image = "/$this->folder/$name";
    }

    private function imageDelete(string $path) {
        File::delete(trim($path, '/'));
    }

}
