<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class LineBotMessage
{

    public function baseConfig()
    {
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(config('line.channel_access_token'));
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => config('line.channel_secret')]);

        return $bot;
    }

    public function getAccessToken(){
        return $this->accessToken;
    }

    public function callback()
    {
        $bot = $this->baseConfig();
        $signature = $_SERVER["HTTP_" . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
        $events = $bot->parseEventRequest(file_get_contents('php://input'), $signature);

        foreach ($events as $event) {
            if ($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage) {
                $bot->replyText($event->getReplyToken(), $event->getText());
            }
        }

    }

    function getBotInfo()
    {
        $bot = $this->baseConfig();
        $response = $bot->getBotInfo();
        if ($response->isSucceeded()) {
            return $response->getJSONDecodedBody();
        } else {
            return false;
        }
    }

    function getUserProfile($userId)
    {
        $bot = $this->baseConfig();
        $response = $bot->getProfile($userId);
        if ($response->isSucceeded()) {
            $profile = $response->getJSONDecodedBody();
            return $profile;
        } else {
            return false;
        }
    }

    function broadcastMessage($msg)
    {
        $bot = $this->baseConfig();
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($msg);
        $response = $bot->broadcast($textMessageBuilder);
        if ($response->isSucceeded()) {
            return $response;
        } else {
            Log::error('Broadcast Message Failed! '. $response->getHTTPStatus() . ' ' . $response->getRawBody());
            return false;
        }
    }

    function sendMessageToUser($userId, $msg)
    {
        $bot = $this->baseConfig();
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($msg);
        $response = $bot->pushMessage($userId, $textMessageBuilder);
        if ($response->isSucceeded()) {
            return $response;
        } else {
            Log::error('Send Message Failed! '. $response->getHTTPStatus() . ' ' . $response->getRawBody());
            return false;
        }
    }

    function sendMessageToMultiUser($userIds, $msg)
    {
        $bot = $this->baseConfig();
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($msg);
        $response = $bot->multicast($userIds, $textMessageBuilder);
        if ($response->isSucceeded()) {
            return $response;
        } else {
            Log::error('Multiple Message Failed! '. $response->getHTTPStatus() . ' ' . $response->getRawBody());
            return false;
        }
    }

    function pushMultipleMessage($userIds, $msg)
    {
        $bot = $this->baseConfig();
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($msg);
        $response = $bot->pushMessage($userIds, $textMessageBuilder);
        if ($response->isSucceeded()) {
            return response()->json([
                'status' => $response->getHTTPStatus(),
                'message' => $response->getRawBody()
            ]);
        } else {
            Log::error('Failed! '. $response->getHTTPStatus() . ' ' . $response->getRawBody());
            return response()->json([
                'status' => $response->getHTTPStatus(),
                'message' => $response->getRawBody()
            ]);
        }
    }

    function getData($jsonFromLine){

    }


    function replyMessage($replyToken, $response){

    }

    function replyMultipleMessage($replyToken, $response){

    }


    function imageTemplate($image, $previewImg){
        return ["type" => "image", "originalContentUrl" => $image, "previewImageUrl" => $previewImg];
    }

    function setMessageText($text){
        return ["type" => "text", "text" => $text];
    }

    function setMessageTemplate($text, $template){
        return ["type" => "template", "altText" => $text, "template" => $template];
    }

    function setMessageImagemap($baseUrl, $altText, $baseWidth, $baseHeight, $actions){
        return ["type" => "imagemap", "baseUrl" => $baseUrl, "altText" => $altText, "baseSize" => ["width" => $baseWidth, "height" => $baseHeight], "actions" => $actions];
    }

    function imagemapUriAction($label, $linkUri, $x, $y, $width, $height){
        return ["type" => "uri", "label" => $label, "linkUri" => $linkUri, "area" => ["x" => $x, "y" => $y, "width" => $width, "height" => $height]];
    }

    function imagemapMessageAction($label, $text, $x, $y, $width, $height){
        return ["type" => "message", "label" => $label, "text" => $text, "area" => ["x" => $x, "y" => $y, "width" => $width, "height" => $height]];
    }

    function buttonTemplate($title, $text, $image = null, $actions){
        $buttons = array();
        $buttons["type"] = "buttons";
        if ($image != "" && $image != null) {
            $buttons["thumbnailImageUrl"] = $image;
        }
        if ($title != "" && $title != null) {
            $buttons["title"] = $title;
        }
        $buttons["text"] = $text;
        $buttons["actions"] = $actions;
        return $buttons;
    }

    function confirmTemplate($text, $actions){
        return ["type" => "confirm", "text" => $text, "actions" => $actions];
    }

    function carouselTemplate($columns)
    {
        return ["type" => "carousel", "columns" => $columns];
    }
    function columnCarousel($title, $text, $image = null, $actions)
    {
        $buttons = array();
        if ($image != "" && $image != null) {
            $buttons["thumbnailImageUrl"] = $image;
        }
        if ($title != "" && $title != null) {
            $buttons["title"] = $title;
        }
        $buttons["text"] = $text;
        $buttons["actions"] = $actions;
        return $buttons;
    }
    function postbackAction($label, $data)
    {
        return ["type" => "postback", "label" => $label, "data" => $data];
    }
    function messageAction($label, $data)
    {
        return ["type" => "message", "label" => $label, "text" => $data];
    }
    function uriAction($label, $data)
    {
        return ["type" => "uri", "label" => $label, "uri" => $data];
    }
    function datetimePickerAction($label, $data, $mode, $initial = null, $max = null, $min = null)
    {
        return ["type" => "datetimepicker", "label" => $label, "data" => $data, "mode" => $mode, "initial" => $initial, "max" => $max, "min" => $min,];
    }
    function flexTemplate($altText, $contents)
    {
        return ["type" => "flex", "altText" => $altText, "contents" => $contents];
    }
    function bubbleContainer($contents)
    {
        return ["type" => "bubble", "body" => $contents];
    }
    function boxComponent($layout, $contents)
    {
        return ["type" => "box", "layout" => $layout, "contents" => [$contents]];
    }
    function buttonComponent($style, $action)
    {
        return ["type" => "button", "style" => $style, "action" => $action];
    }
    function hyperlinkComponent($text, $action)
    {
        return ["type" => "text", "text" => $text, "wrap" => true, "color" => "#4e67ef", "action" => $action];
    }
}
