<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\LineBotMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.message.index', [
            'page_title' => 'LINE DEMO CHAT',
            'page_type' => 'create',
            'form_action'=> route('chat.broadcast'),
            'form_action2' => route('chat.send'),
        ]);
    }

    public function broadcast(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $bot = new LineBotMessage();
        $response = $bot->broadcastMessage($request->message);

        if($response->getHTTPStatus() == 200){
            return redirect()->back()->with('success', 'Message sent successfully');
        }else{
            return redirect()->back()->with('errors', 'Message sent failed' . $response->getRawBody());
        }

    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $bot = new LineBotMessage();
        $response = $bot->broadcastMessage($request->message);

        if($response->getHTTPStatus() == 200){
            return redirect()->back()->with('success', 'Message sent successfully');
        }else{
            return redirect()->back()->with('errors', 'Message sent failed' . $response->getRawBody());
        }

    }

    public function getProfileUser(Request $request)
    {
        $bot = new LineBotMessage();
        $response = $bot->getUserProfile($request->userId);

        return response()->json($response);
    }

    public function getBotInfo()
    {
        $bot = new LineBotMessage();
        $response = $bot->getBotInfo();
        return response()->json($response);
        return redirect()->back()->with([
                'success', 'Message sent successfully',
                'data' => $response
            ]);
    }

    public function callback(Request $request)
    {
        $bot = new LineBotMessage();
        $response = $bot->webhook($request);
        return response()->json($response);
    }

}
