<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    /**
     * @param Employee $model
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Employee $model)
    {
        $employees = $model->paginate();

        return view('employee.index', compact('employees'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * @param EmployeeCreateRequest $request
     * @param Employee $employee
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployeeCreateRequest $request, Employee $employee)
    {
        $employee->createNewEmployee($request->all());

        return redirect()->route('employees.index');
    }

    public function show($id)
    {
        //
    }

    /**
     * @param Employee $employee
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * @param EmployeeUpdateRequest $request
     * @param Employee $employee
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $employee->updateEmployee($request->all());

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
