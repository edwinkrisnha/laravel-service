<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $models = Employee::where( 'status', 1 )->get();
      return view( 'employee.index', compact( 'models' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $model = new Employee();
      return view( 'employee.form', compact( 'model' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $model = new Employee();
      $model->username = $request->username;
      $model->fullname = $request->fullname;
      $model->email = $request->email;
      $model->mobile = $request->mobile;
      $model->birthday = $request->birthday;
      $model->save();

      return redirect()->route( 'employee.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
      $model = $employee;
      return view( 'employee.form', compact( 'model' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
      $model = $employee;
      return view( 'employee.form', compact( 'model' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
      $model = $employee;
      $model->username = $request->username;
      $model->fullname = $request->fullname;
      $model->email = $request->email;
      $model->mobile = $request->mobile;
      $model->birthday = $request->birthday;
      $model->save();

      return redirect()->route( 'employee.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
      $model = $employee;
      $model->status = 0;
      $model->deleted_at = Carbon::now();
      $model->save();

      return true;
    }
}
