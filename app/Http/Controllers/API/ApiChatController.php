<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\LineBotMessage;
use App\Http\Controllers\Controller;

class ApiChatController extends Controller
{
    public function broadcastMessage(Request $request)
    {
        $bot = new LineBotMessage();
        $response = $bot->broadcastMessage($request->message);

        if($response->getHTTPStatus() == 200){
            return response()->json($response);
        }else{
            return response()->json($response);
        }

    }

    public function sendMessageToUser(Request $request)
    {
        $bot = new LineBotMessage();
        $response = $bot->sendMessageToUser($request->userId, $request->message);

        if($response->getHTTPStatus() == 200){
            return response()->json($response);
        }else{
            return response()->json($response);
        }

    }

    public function getBotInfo()
    {
        $bot = new LineBotMessage();
        $response = $bot->getBotInfo();
        return response()->json($response);
    }

    public function webhook(Request $request)
    {
        $bot = new LineBotMessage();
        $bot->webhook($request);
        // return response()->json($response);
    }

    public function getUserProfile(Request $request)
    {
        $bot = new LineBotMessage();
        $response = $bot->getUserProfile($request->userId);

        return response()->json($response);
    }

}
