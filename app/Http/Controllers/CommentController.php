<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Carbon\Carbon;

use Auth;
class CommentController extends Controller
{
    //

function create($post_id)
{
    $post=Post::find($post_id);
    return view('show',compact('post'));
}

function store(Request $request)
{
    $post = Post::find($request -> post_id);
    $comment = new Comment;
    $comment -> body = $request -> body;
    $comment -> user_id = Auth::id();
    $comment -> post_id = $request -> post_id;
    $comment -> save();
    return redirect() -> route('posts.show', $post -> id);
}

//何分前表示
function show($id)
{
    $comment = Comment::findOrFail($id);
    $comment -> formattedCreatedAt = $this -> formatTimeAgo($comment->created_at);

    return view('show', compact('comments'));
}

private function formatTimeAgo($dateTime)
{
    return Carbon::parse($dateTime)->diffForHumans();
}
}
?>