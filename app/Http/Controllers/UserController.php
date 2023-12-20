<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Country;
use App\Models\Occupation;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // 自分以外のユーザーを表示
    // public function index()
    // {
    //     $loggedInUser = Auth::user(); // ログインしているユーザーの情報を取得

    //     // ログインユーザー以外のユーザーを取得
    //     $users = User::where('id', '!=', $loggedInUser->id)
    //         ->with('country', 'occupation')
    //         ->orderBy('id', 'DESC')
    //         ->paginate(15);

    //     $countries = Country::all();
    //     $occupations = Occupation::all();

    //     return view('users.users', compact('users', 'countries', 'occupations'));
    // }

    // ユーザー検索
    // function search(Request $request)
    // {
    //     $countryId = $request->input('country_id');
    //     $occupationId = $request->input('occupation_id');

    //     // タグ一覧を取得
    //     $countries = Country::all();
    //     $occupations = Occupation::all();

    //     // 選択されたタグに関連する投稿を取得
    //     $usersQuery = User::query();

    //     if ($countryId) {
    //         $usersQuery->where('country_id', $countryId);
    //     }

    //     if ($companyId) {
    //         $usersQuery->where('occupation_id', $occupationId);
    //     }

    //     $users = $usersQuery->get();

    //     return view('users.users', [
    //         'users' => $users,
    //         'countries' => $countries,
    //         'occupations' => $occupations
    //     ]);
    // }
}
