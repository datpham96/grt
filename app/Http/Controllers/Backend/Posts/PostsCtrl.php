<?php

namespace App\Http\Controllers\Backend\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsCtrl extends Controller
{
    public function posts() {
        return view('backend.posts.posts');
    }

    public function postDetail() {
        return view('backend.posts.postDetail');
    }

    public function main() {
        return view('backend.posts.main');
    }
}
