<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\ChatMessageReceived;

class ChatController extends Controller
{

    //チャットユーザー選択画面
    public function select()
    {
        $user = Auth::user();
 
        // ログイン者以外のユーザを取得する
        $users = User::where('id' ,'<>' , $user->id)->get();
        // チャットユーザ選択画面を表示
        return view('chats.select' , compact('users'));
    }

    //ここから下はチャットページ
    public function __construct()
    {
    }

    public function index(Request $request , $receive)
    {
        // チャットの画面
        $loginId = Auth::id();
 
        $param = [
          'send' => $loginId,
          'receive' => $receive,
        ];
 
        // 送信 / 受信のメッセージを取得する
        $query = Message::where('send' , $loginId)->where('receive' , $receive);;
        $query->orWhere(function($query) use($loginId , $receive){
            $query->where('send' , $receive);
            $query->where('receive' , $loginId);
 
        });
 
        $messages = $query->get();
 
        return view('chats.chat' , compact('param' , 'messages'));
    }
 
    /**
     * メッセージの保存をする
     */
    public function store(Request $request)
    {
 
        // リクエストパラメータ取得
        $insertParam = [
            'send' => $request->input('send'),
            'receive' => $request->input('receive'),
            'message' => $request->input('message'),
        ];
 
        // メッセージデータ保存
        try{
            Message::insert($insertParam);
        }catch (\Exception $e){
            return false;
 
        }

        // イベント発火
        event(new ChatMessageReceived($request->all()));
        return true;

    }
}
