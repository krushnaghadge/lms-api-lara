<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use App\Models\Language;

class CourseController extends Controller
{
    //this controller return the all course for a specific user
    public function index() {}


    //
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:10',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        //this will save the course
        $course = new Course();
        $course->title = $request->title;
        $course->status = 0; //by default status is 0    
        $course->user_id = $request->user()->id; // जर नाही दिलं तर null ठेवा

        $course->save();

        return response()->json([
            'status' => 200,
            'message' => 'Course has been created successfully',
        ], 200);
    }

    //this method will return language level and category metadata
    public function metaData(Request $request)
    {
        $categories = Category::all();
        $levels = Level::all();
        $languages = Language::all();

        return response()->json([
            'status' => 200,
            'data' => [
                'categories' => $categories,
                'levels' => $levels,
                'languages' => $languages,
            ]
        ], 200);
    }

    public function show($id)
    {
        $course = Course::find($id);
        if (!$course) {
            return response()->json([
                'status' => 404,
                'message' => 'Course not found',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $course,
        ], 200);
    }



    public function update($id, Request $request)
    {
        $course = Course::find($id);
        if (!$course) {
            return response()->json([
                'status' => 404,
                'message' => 'Course not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:10',
            'category' => 'required',
            'level' => 'required',
            'language' => 'required',
            'sell_price' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        //this will update the course

        $course->title = $request->title;

        $course->category_id = $request->category;
        $course->level_id = $request->level;
        $course->language_id = $request->language;
        $course->price = $request->sell_price;
        $course->cross_price = $request->cross_price;
        $course->description = $request->description;
        $course->save();

        return response()->json([
            'status' => 200,
            'data' => $course,
            'message' => 'Course has been updated successfully',
        ], 200);
    }
}
