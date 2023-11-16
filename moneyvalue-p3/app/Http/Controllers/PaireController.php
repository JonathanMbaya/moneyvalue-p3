<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Paire;
use Illuminate\Http\Request; // Assurez-vous d'importer la classe Request
use App\Http\Requests\StoredevisesRequest;
use App\Http\Requests\UpdatedevisesRequest;

class PaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPaire = Paire::all();
        return response()->json(['data' => $allPaire]);
    }

    public function onePaire(Request $request, $id){
        $paire = Paire::find($id);

        if (!$paire) {
            return response()->json([
                'status' => 404,
                'message' => 'Paire not found!'
            ], 404);
        }else{
            return response()->json([
                'data'=>$paire
            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'source_currency' => 'required|string',
            'target_currency' => 'required|string',
            'rate' => 'required|numeric',
            'number_requests' => 'nullable|integer',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        } else {
            $paire = new Paire;
            $paire->id = $request->id;
            $paire->source_currency = $request->source_currency;
            $paire->target_currency = $request->target_currency;
            $paire->rate = $request->rate;
            $paire->number_of_requests = $request->number_of_requests;
            $paire->created_at = now();
            $paire->updated_at = now();

            $paire->save();

            if ($paire) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Paire has been created successfully!'
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

    $paire = paire::find($id);

    if (!$paire) {
        return response()->json([
            'status' => 404,
            'message' => 'Paire not found!'
        ], 404);
    }

    $paire->code = $request->code;
    $paire->name = $request->name;
    $paire->updated_at = $request->updated_at;

    $paire->save();

    if ($paire) {
        return response()->json([
            'status' => 200,
            'message' => 'Paire has been updated successfully!',
            'data' => $paire
        ], 200);
    } else {
        return response()->json([
            'status' => 500,
            'message' => 'Something went wrong!'
        ], 500);
    }
    }

    public function delete($id){
        $paire = paire::find($id);

        $paire->delete();

        $data = [
            'status' => 200,
            'message' => "Data deleted successfully"
        ];

        return response() ->json($data,200);
    }
}
