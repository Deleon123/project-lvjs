<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseHasUser;

class CourseHasUserController extends Controller
{
     /**
     * Shows CourseHasUser
     * @param Request $request
     * @return CourseHasUser[]
     */
    public function show(Request $request)
    {
        return CourseHasUser::findAll($request->id);
    }

     /**
     * Updates CourseHasUser
     * @param Request $request
     * @return bool 
     */
    public function update(Request $request)
    {
        return CourseHasUser::update($request->all());
    }
}
