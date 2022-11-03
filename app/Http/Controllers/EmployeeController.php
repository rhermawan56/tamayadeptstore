<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $title = 'Data Karyawan';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.index', [
            'title' => $this->title,
            'section' => 'employeefile',
            'data' => Employee::all(),
            'no' => 1
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create', [
            'title' => $this->title,
            'section' => 'employeeplus',
            'data' => Employee::all(),
            'no' => 1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->password != $request->confirmPassword) {
            $request['confirmPassword'] = null;
        }

        $rule = [
            'nip' => 'required',
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirmPassword' => 'required'
        ];

        $validation = $request->validate($rule);
        unset($validation['confirmPassword']);

        $dataEmployee = [
            'nip' => $validation['nip'],
            'name' => $validation['name'],
            'address' => $validation['address'],
            'gender' => $validation['gender'],
            'role' => $validation['role'],
        ];

        Employee::create($dataEmployee);

        $dataUser = [
            'employee_id' => Employee::latest()->first()->id,
            'email' => $validation['email'],
            'password' => $validation['password'],
            'type' => 'admin',
        ];
        User::create($dataUser);

        return redirect('/dashboard/employee')->with('success', 'Data karyawan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.edit', [
            'title' => 'Data Karyawan',
            'employee' => Employee::firstWhere('id', $id),
            'section' => 'employeefile'
        ]);
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
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $authentication = auth()->user()->id;

        if ($authentication == $request->user_id) {
            return response()->json([
                'message' => 'Error',
                'message_fail' => 'Data gagal dihapus',
            ]);
        }

        $employee = Employee::firstWhere('id', $request->employee_id);
        $statusUser = User::firstWhere('id', $employee->user->id)->delete();
        $statusEmployee = $employee->delete();

        return response()->json([
            'status_user' => $statusUser,
            'status_employee' => $statusEmployee,
            'message_success' => 'Data berhasil dihapus',
            'message_fail' => 'Data gagal dihapus',
        ]);
    }

    public function editLogin()
    {
        dd('hello edit login');
    }
}
