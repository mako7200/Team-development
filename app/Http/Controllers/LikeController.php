<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
        //✅いいね保存処理を記述
        public function store(Request $request)
        {
            $like = new Like();     //Likeテーブル作成
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
    
            return redirect('/like');
        }
    
        //✅いいねの取り消し
        public function destroy(Request $request)
        {
            $like = like::find($request->like_id);
            $like->delete();
            return redirect('/like');
        }
}
