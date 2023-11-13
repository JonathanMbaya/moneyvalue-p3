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
            'created_at' => 'date',
            'updated_at' => 'date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        } else {
            $devises = new Devises;
            $devises->id = $request->id;
            $devises->code = $request->code;
            $devises->name = $request->name;
            $devises->created_at = now();
            $devises->updated_at = now();

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

    public function edit(Request $request, $id)
    {
    $validator = Validator::make($request->all(), [
        'code' => 'required|string',
        'name' => 'required|string',
        'updated_at' => 'date'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 422,
            'error' => $validator->messages()
        ], 422);
    }

    $devises = Devises::find($id);

    if (!$devises) {
        return response()->json([
            'status' => 404,
            'message' => 'Devise not found!'
        ], 404);
    }

    $devises->code = $request->code;
    $devises->name = $request->name;
    $devises->updated_at = $request->updated_at;

    $devises->save();

    if ($devises) {
        return response()->json([
            'status' => 200,
            'message' => 'Devise has been updated successfully!',
            'data' => $devises
        ], 200);
    } else {
        return response()->json([
            'status' => 500,
            'message' => 'Something went wrong!'
        ], 500);
    }
    }

    public function delete($id){
        $devises = Devises::find($id);

        $devises->delete();

        $data = [
            'status' => 200,
            'message' => "Data deleted successfully"
        ];

        return response() ->json($data,200);
    }


}
