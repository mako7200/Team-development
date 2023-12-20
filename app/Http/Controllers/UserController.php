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


}
