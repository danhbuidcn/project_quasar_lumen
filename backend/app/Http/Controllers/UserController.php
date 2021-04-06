<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class UserController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    // show all
    public function index(Request $request){
        $result = $this->model->listItem($request->all(), ['task' => 'default']);

        return response()->json(['data' => $result]);
    }

    // create new
    public function create(Request $request) {
        $this->validate($request, [
            'user'=>'required' ,
            'pass'=>'required'
        ]);
        $user = User::create($request->all());
        return response()->json($user,200);
    }
//  update user
    public function update($id,Request $request) {
        $this->validate($request, [
            'user'=>'required',
            'pass'=>'required',
            'description'=>'required'
        ]);
        $user=User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user,200);
    }
//    delete user by id
    public function delete($id,Request $request) {
        User::findOrFail($id)->delete();
        return response('delete',200);
    }
}
