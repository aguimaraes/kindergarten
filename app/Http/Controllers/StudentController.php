<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Student;
use App\StudentParent;

class StudentController extends Controller
{
    /**
     * @param Student $model
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Student $model)
    {
        $students = $model->paginate();

        return view('student.index', compact('students'));
    }

    /**
     * @param StudentParent $parentModel
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(StudentParent $parentModel)
    {
        $parents = $parentModel->all('id', 'name');

        return view('student.create', compact('parents'));
    }

    /**
     * @param StudentCreateRequest $request
     * @param Student $student
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StudentCreateRequest $request, Student $student)
    {
        $student->createNewStudent($request->all());

        return redirect()->route('students.index');
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
     * @param Student $student
     * @param StudentParent $parentModel
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Student $student, StudentParent $parentModel)
    {
        $parents = $parentModel->all('id', 'name');

        return view('student.edit', compact('student', 'parents'));
    }

    /**
     * @param StudentUpdateRequest $request
     * @param Student $student
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $student->updateStudent($request->all());

        return redirect()->route('students.index');
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
