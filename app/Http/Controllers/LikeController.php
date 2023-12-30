<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
        //✅いいね保存処理
        public function store(Request $request)
        {
            $like = new Like();     //Likeテーブル作成
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
            
            if($request->has(''))
            return redirect()->route('posts.index');
        }
    
        //✅いいね削除
        public function destroy(Request $request)
        {
            $like = Like::find($request->like_id);
            $like->delete();
            return redirect()->route('posts.index');
        }

        //✅いいね一覧表示
        // public function index()
        // {
            // ログイン中のユーザーがいいねした投稿を取得
            // $likedPosts = Like::where('user_id', auth()->id())->pluck('post_id');
            // 対応する投稿を取得
        //     $posts = Post::whereIn('id', $likedPosts)->get();

        //     return view('posts.like', compact('posts'));
        // }
}
