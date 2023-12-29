<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Country;
use App\Models\Occupation;
use Faker\Provider\UserAgent;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{

    // 自分以外のユーザーの表示
    function index()
    {
        $loggedInUser = Auth::user();

        $users = User::where('id', '!=', $loggedInUser->id)
            ->with('country', 'occupation')
            ->orderBy('id', 'DESC')
            ->paginate(15);

        $countries = Country::all();
        $occupations = Occupation::all();

        return view('users.users', compact('users', 'countries', 'occupations'));
    }

    // ユーザー検索機能
    function search(Request $request)
    {
        $countryId = $request->input('country_id');
        $occupationId = $request->input('occupation_id');

        $loggedInUser = Auth::user();

        $countries = Country::all();
        $occupations = Occupation::all();

        $usersQuery = User::where('id', '!=', $loggedInUser->id);

        if ($countryId) {
            $usersQuery->where('country_id', $countryId);
        }

        if ($occupationId) {
            $usersQuery->where('occupation_id', $occupationId);
        }

        $users = $usersQuery->get();

        return view('users.users', [
            'users' => $users,
            'countries' => $countries,
            'occupations' => $occupations
        ]);
    }

    //✅プロフィール詳細
    // function show($id)
    // {
    //     $user = User::find($id);

    //     if ($user) {
    //         return view('profile', ['user' => $user]);
    //     } else {
    // ユーザーが見つからない場合は、適切なエラーハンドリングを行うか、リダイレクトさせるなどの処理を追加
    //             return redirect()->route('profile');
    //         }

    //         redirect('posts.profile');
    //     }




    function show($id)
    {

        $user = User::find($id);
        if (!$user){
            return redirect()->route('not_found_page');
        }

        $posts = $user -> posts;
        $post = $posts -> first();

        // return view('posts.profile', ['user' => $user, 'posts' => $posts 'post' => $post]);
        return view('posts.profile', ['user' => $user, 'posts' => $posts, 'post' => $post]);
    }


    function posts(User $user)
    {
        $posts = $user->posts;
        $post = $posts->first(); 

        return view('posts.profile',[
            'user'=>$user,
            'posts'=>$posts, //$postsをビューに渡す
            'post'=>$post,
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profile_edit', ['user' => $user]);
    }


}