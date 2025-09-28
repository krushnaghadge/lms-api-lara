<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Outcome;


class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $outcomes = Outcome::where('course_id', $request->course_id)->get();

        return response()->json([
            'status' => 200,
            'data' => $outcomes,
        ], 200);

        return response()->json([
            'status' => 404,
            'message' => 'No outcomes found',
        ], 404);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'outcome' => 'required',
            'course_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $outcome = new Outcome();
        $outcome->course_id = $request->course_id;
        $outcome->text = $request->outcome;
        $outcome->sort_order = 1000;
        $outcome->save();


        return response()->json([
            'status' => 200,
            'message' => 'Outcome has been added successfully',
        ], 200);

        return response()->json([
            'status' => 500,
            'message' => 'Something went wrong',
        ], 500);
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }



    // for outcome update

    public function update(Request $request, string $id)
    {
        $outcome = Outcome::find($id);
        if (!$outcome) {
            return response()->json([
                'status' => 404,
                'message' => 'Outcome not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [

            'outcome' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }


        $outcome->text = $request->outcome;
        $outcome->save();


        return response()->json([
            'status' => 200,
            'message' => 'Outcome has been added successfully',
        ], 200);

        return response()->json([
            'status' => 500,
            'message' => 'Something went wrong',
        ], 500);
    }


    // for the outcome delete

    public function destroy($id)
    {
        $outcome = Outcome::find($id);
        if (!$outcome) {
            return response()->json([
                'status' => 404,
                'message' => 'Outcome not found',
            ], 404);
        }

        $outcome->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Outcome has been deleted successfully',
        ], 200);
    }
}
