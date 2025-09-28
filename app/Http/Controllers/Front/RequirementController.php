<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requirement;




class RequirementController extends Controller
{

    public function index()
    {
        $requirements = Requirement::where('course_id', $request->course_id)->get();
        return response()->json(
            [
                'status' => '200',
                'data' => $requirements

            ],
            200
        );
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required',
            'requirement' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $requirement = new Requirement();
        $requirement->course_id = $request->course_id;
        $requirement->text = $request->requirement;
        $requirement->sort_order = 1000;
        $requirement->save();



        return response()->json([
            'status' => 200,
            'message' => 'Requirement added successfully',
            'data' => $requirement
        ], 200);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $requirement = Requirement::find($id);
        if (!$requirement) {
            return response()->json([
                'status' => 404,
                'message' => 'Requirement not found'
            ], 404);
        }

        $requirement->text = $request->requirement;
        $requirement->save();

        return response()->json([
            'status' => 200,
            'message' => 'Requirement updated successfully',
            'data' => $requirement
        ], 200);
    }


    public function destroy($id)
    {
        $requirement = Requirement::find($id);
        if (!$requirement) {
            return response()->json([
                'status' => 404,
                'message' => 'Requirement not found',
            ], 404);
        }

        $requirement->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Requirement has been deleted successfully',
        ], 200);
    }
}
