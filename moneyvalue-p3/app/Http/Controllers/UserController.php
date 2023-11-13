<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function authenticate(Request $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        return response()->json([
            'token' => $user->remember_token,
        ]);
    }

    public function dashboard(): JsonResponse{
        return response()->json([
            'success'=>'Bienvenue'
        ]);
    }

    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->remember_token = Str::random(10);
            $user->created_at = now();
            $user->updated_at = now();

            $user->save();

            if ($user) {
                return response()->json([
                    'status' => 200,
                    'message' => 'User has been created successfully!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong!'
                ]);
            }
        }
    }


    public function delete($id){
        $user = User::find($id);

        $user->delete();

        $data = [
            'status' => 200,
            'message' => "Data deleted successfully"
        ];

        return response() ->json($data,200);
    }
}
