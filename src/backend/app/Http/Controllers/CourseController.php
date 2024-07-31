<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
     /**
     * Shows Course
     * @param Request $request
     * @return Course 
     */
    public function show(Request $request)
    {
        return Course::find($request->id);
    }

     /**
     * Updates Course
     * @param Request $request
     * @return bool 
     */
    public function update(Request $request)
    {
        return Course::update($request->all());
    }
}
