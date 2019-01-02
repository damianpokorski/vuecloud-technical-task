<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\Companies;
use App\Http\Requests\StoreEmployee;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $company = Companies::find($request->company);
        return view(
            'employees.index', 
            [
            'company' => $company, 
            'employees' => $company->employees()->paginate(10)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $company = Companies::find($request->company);
        return view('employees.create', ['company' => $company]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        //
        $request->validated();
        $company = Companies::find($request->company);
        $employee = new Employees();
        $employee->fill($request->all());
        $employee->company_id = $company->id;
        $employee->save();
        return redirect()->action('EmployeesController@show', ['id' => $employee->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employee)
    {
        return view('employees.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employee)
    {
        return view('employees.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployee $request, Employees $employee)
    {
        $request->validated();
        $employee->fill($request->all());
        $employee->save();
        return redirect()->action('EmployeesController@show', ['id' => $employee->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employee)
    {
        //
        $redirect = redirect()->action('EmployeesController@index', ['company' => $employee->company_id]);
        $employee->delete();
        return $redirect;
    }
}
