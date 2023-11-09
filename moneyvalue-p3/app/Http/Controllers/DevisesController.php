<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Devises;
use Illuminate\Http\Request; // Assurez-vous d'importer la classe Request
use App\Http\Requests\StoredevisesRequest;
use App\Http\Requests\UpdatedevisesRequest;

class DevisesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allDevise = Devises::all();
        return response()->json(['data' => $allDevise]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'name' => 'required|string',
            'created_at' => 'required',
            'updated_at' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        } else {
            $devises = new Devises;
            $devises->code = $request->code;
            $devises->name = $request->name;
            $devises->created_at = $request->created_at;
            $devises->updated_at = $request->updated_at;

            $devises->save();

            if ($devises) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Devise has been created successfully!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong!'
                ]);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoredevisesRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    // public function show(devises $devises)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(devises $devises)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdatedevisesRequest $request, devises $devises)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(devises $devises)
    // {
    //     //
    // }
}
