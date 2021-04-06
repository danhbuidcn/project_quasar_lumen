<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Tag;

class TagController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Tag();
    }

    // show all
    public function index(Request $request){
        $result = $this->model->listItem($request->all(), ['task' => 'default']);

        return response()->json(['data' => $result]);
    }

    // create new
    public function create(Request $request) {
        $this->validate($request, [
            'tag_name'=>'required'
        ]);
        $tag = Tag::create($request->all());
        return response()->json($tag,200);
    }
//  update user
    public function update($id,Request $request) {
        $this->validate($request, [
            'tag_name'=>'required',
        ]);
        $tag=Tag::findOrFail($id);
        $tag->update($request->all());
        return response()->json($tag,200);
    }
////    delete user by id
//    public function delete($id,Request $request) {
//        User::findOrFail($id)->delete();
//        return response('delete',200);
//    }
}
