<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{

    public function getUsers(Request $request){
        $users = User::all();
        return response()->json(['data' => $users]);
    }

    public function add(Request $request)
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
            $user->created_at = $request->created_at;
            $user->updated_at = $request->updated_at;

            $devises->save();

            if ($devises) {
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
