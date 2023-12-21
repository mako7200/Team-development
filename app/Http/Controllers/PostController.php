<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Country;
use App\Models\Occupation;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //投稿一覧表示
    public function index()
    {
        $countries = Country::all();
        $occupations = Occupation::all();
        $posts = Post::with('country','occupation')
            ->orderBy('id', 'DESC')
            ->paginate(15);
    
        return view('posts.index', compact('posts', 'countries','occupations'));
    }
    
    //投稿作成
    function create()
    {
        $countries = Country::all();
        $occupations = Occupation::all();
        return view('posts.create')->with(['countries' => $countries, 'occupations' => $occupations]);
    }
    
    //投稿新規保存
    function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:20',
            'content'=>'required',
            'country_id'=>'required',
            'occupation_id'=>'required',
        ]);

        $post = new Post;

        $post->title = $request->input(["title"]);
        $post->content = $request->input(["content"]);
        $post->country_id = $request->input(["country_id"]);
        $post->occupation_id = $request->input(["occupation_id"]);
        $post->user_id = Auth::id(); // ログインユーザーのIDを取得

        $post->save();

        return redirect()->route('posts.index');
    }

    //投稿検索
    function search(Request $request)
    {
        $countryId = $request->input('country_id');
        $occupationId = $request->input('occupation_id');

        // タグ一覧を取得
        $countries = Country::all();
        $occupations = Occupation::all();

        // 選択されたタグに関連する投稿を取得
        $postsQuery = Post::query();

        if ($countryId) {
            $postsQuery->where('country_id', $countryId);
        }

        if ($occupationId) {
            $postsQuery->where('occupation_id', $occupationId);
        }

        $posts = $postsQuery->get();

        return view('posts.index', [
            'posts' => $posts,
            'countries' => $countries,
            'occupations' => $occupations
        ]);
    }

    //✅詳細
    function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }
}
