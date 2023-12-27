<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    //

function create($post_id)
{
    $post=Post::with('comments')->find($post_id);
    if(!$post){
        abort(404);
    }

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

    if(Auth::check()){
        $user_id = Auth::id();
    }else{
        return redirect() -> route('login') -> with('error', 'ログインが必要です');
    }

    $request->validate([
        'body' => 'required|string|max:250', 
    ]);
    return redirect() -> route('posts.show', $post -> id);
}

function show($postId)
{
    $comment = Comment::findOrFail($postId);
    $comment -> formattedCreatedAt = $this -> formatTimeAgo($comment->created_at);
    $post = Post::with('comments')->findOrFail($postId);

    return view('show', compact('comment'));
}

private function formatTimeAgo($dateTime)
{
    return Carbon::parse($dateTime)->diffForHumans();
}

public function __construct()
{
    $this->middleware('auth'); // コメントを投稿するアクションに対して
}

}
?>