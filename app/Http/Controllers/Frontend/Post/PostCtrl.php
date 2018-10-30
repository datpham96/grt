<?php

namespace App\Http\Controllers\Frontend\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostModel;

class PostCtrl extends Controller
{
    private $postModel;

    public function __construct(PostModel $postModel){
    	$this->postModel = $postModel;
    }

    public function getPost(Request $request){
    	$getPost = $this->postModel->orderBy('created_at', 'desc')->paginate(5);

    	return view('frontend.post.post', compact('getPost'));
    }

    public function getPostDetail(Request $request, $id){
    	$getPostDetail = $this->postModel->filterId($id)->buildCond()->first();
        $totalView = $getPostDetail->total_view;
        $getPostDetail->total_view = $totalView + 1;
        $getPostDetail->save();

    	return view('frontend.post.postDetail', compact('getPostDetail'));
    }
}
