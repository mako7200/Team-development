<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Country;
use App\Models\Occupation;
use Faker\Provider\UserAgent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        return view('posts.search', compact('users', 'countries', 'occupations'));
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

        return view('posts.search', [
            'users' => $users,
            'countries' => $countries,
            'occupations' => $occupations
        ]);
    }
    
    //✅プロフィール詳細
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
        $countries = Country::all(); // 適切なクエリで国データを取得する
        $occupations = Occupation::all(); // 適切なクエリで職業データを取得する

        //ユーザーが既に選択している国と企業の情報を取得
        $selectedCountry = $user->country_id;
        $selectedOccupation = $user->occupation_id;

        return view('profile_edit', compact('user', 'countries', 'occupations','selectedCountry','selectedOccupation'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['string','max:30'],
            'avatar' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            
        ],);

        $user = User::find($id);
        $user->name =$request->input('name');
        $user->country_id = $request->input(["country_id"]);
        $user->occupation_id = $request->input(["occupation_id"]);
        

        // 画像のアップロード処理
        if ($request->hasFile('avatar')) {
            // 古い画像が存在する場合、それを削除
            if ($user->avatar) {
                Storage::delete('public/images' . $user->avatar);
            }

            //新しい画像をstorage ディレクトリに保存
            $imagePath = $request->file('avatar')->store('public/images');

            //新しい画像のパスをデータベースに保存
            $user->avatar = basename($imagePath);
        }
        if ($request->has('remove_image')) {
            //古い画像を削除する処理
            if($user->avatar){
                Storage::delete('public/images' . $user->avatar);
                $user->avatar = null;
            }
        }

        $user->save();

        // リダイレクト先
        return redirect()->route('posts.profile', ['id' => $user->id]);

    }


}