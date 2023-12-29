<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LikeController extends Controller
{
    // ✅いいね保存処理
    public function store(Request $request)
    {
        // 認証の確認
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'ログインしてください。');
        }

        $like = new Like(); // Likeテーブル作成
        $like->post_id = $request->post_id;
        $like->user_id = $user->id;
        $like->save();

        Log::info('Like saved: ' . $like->id);

        return $this->redirectBasedOnRequest($request, $like->post_id);
    }

    // ✅いいね削除
    public function destroy(Request $request)
    {
        try {
            $like = Like::findOrFail($request->like_id);
            $postId = $like->post_id; // 削除前にpostIdを保存
            $like->delete();
        } catch (\Exception $e) {
            Log::error('Error deleting like: ' . $e->getMessage());
            return redirect()->back()->with('error', 'いいねの削除に失敗しました。');
        }

        return $this->redirectBasedOnRequest($request, $postId);
    }

    // ✅いいね一覧表示
    public function index()
    {
        // ログイン中のユーザーがいいねした投稿を取得
        $likedPosts = Like::where('user_id', auth()->id())->pluck('post_id');
        // 対応する投稿を取得
        $posts = Post::whereIn('id', $likedPosts)->get();

        return view('posts.like', compact('posts'));
    }

    private function redirectBasedOnRequest(Request $request, $postId)
    {
        if ($request->has('from_index')) {
            return redirect()->route('posts.index');
        } elseif ($request->has('from_profile')) {
            return redirect()->route('posts.profile', ['id' => $postId]);
        } else {
            return redirect()->route('posts.like', ['id' => $postId]);
        }
    }
}

