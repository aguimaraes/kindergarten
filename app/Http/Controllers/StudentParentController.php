<?php

namespace App\Http\Controllers;

use App\StudentParent;
use Illuminate\Http\Request;

use App\Http\Requests;

class StudentParentController extends Controller
{
    /**
     * @param StudentParent $model
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(StudentParent $model)
    {
        $studentParents = $model->paginate();

        return view('studentparent.index', compact('studentParents'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('studentparent.create');
    }

    /**
     * @param Requests\StudentParentCreateRequest $request
     * @param StudentParent $parent
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\StudentParentCreateRequest $request, StudentParent $parent)
    {
        $parent->createNewStudentParent($request->all());
        return redirect()->route('parents.index');
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * @param StudentParent $parent
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(StudentParent $parent)
    {
        return view('studentparent.edit', compact('parent'));
    }

    /**
     * @param Requests\StudentParentUpdateRequest $request
     * @param StudentParent $parent
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Requests\StudentParentUpdateRequest $request, StudentParent $parent)
    {
        $parent->updateStudentParent($request->all());
        return redirect()->route('parents.index');
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
