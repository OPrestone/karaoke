<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check())
        {
            $validator = Validator::make($request->all(),[
                'comment_body'=> 'required |string'
                ]);
            if($validator->fails())
            {
                return redirect()->back()->with('message', 'Comment area is mandatory');
            }
            $post = Post::where('slug', $request->post_slug)->where('status', '0')->first();
            if ($post) {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body'=> $request->comment_body
                ]);
                return redirect()->back()->with('message', 'Comment Added Successfully');

            }
            else {
               return redirect()->back()->with('message', 'Post Not Found');
            }

        }
        else {
           return redirect('login')->with('message', 'Login First to Comment');
        }
    }
}
