<?php

namespace App\Helpers;

use App\Models\LineLinkMember;
use Exception;
use LINE\LINEBot;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use LINE\LINEBot\SignatureValidator;
use LINE\LINEBot\Constant\HTTPHeader;
use Illuminate\Support\Facades\Config;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class LineBotMessage
{

    public function baseConfig()
    {
        $httpClient = new CurlHTTPClient(config('line.channel_access_token'));
        $bot = new LINEBot($httpClient, ['channelSecret' => config('line.channel_secret')]);

        return $bot;
    }

    public function validateSignature(Request $request)
    {
        $signature = $request->header(HTTPHeader::LINE_SIGNATURE);
        if (empty($signature)) {
            throw new Exception('Signature not set');
        }

        if (!SignatureValidator::validateSignature($request->getContent(), config('line.channel_secret'), $signature)) {
            throw new Exception('Invalid signature');
        }
    }

    public function getAccessToken(){
        return $this->accessToken;
    }

    public function webhook (Request $request)
    {
        $signature = $request->header(HTTPHeader::LINE_SIGNATURE);
        $this->validateSignature($request);

        $httpClient = new CurlHTTPClient (config('line.channel_access_token'));
        $lineBot = new LINEBot($httpClient, ['channelSecret' => config('line.channel_secret')]);

        try {

            $events = $lineBot->parseEventRequest($request->getContent(), $signature);
            Log::info(json_encode($events, JSON_PRETTY_PRINT));
            foreach ($events as $event) {
                // handle event message
                if ($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage) {
                    // if receive text message 'Link Account'
                    if($event->getText() == 'Link Account'){
                        // check if user already linked
                        $lineLinkMember = Member::where('line_id', $event->getUserId())->first();
                        // if already linked send message
                        if($lineLinkMember){
                            $lineBot->replyText($event->getReplyToken(), 'Your account already linked with email ' . $lineLinkMember->email);
                        } else {
                            // if not linked, start link account process
                            // create link token
                            $linkToken = $lineBot->createLinkToken($event->getUserId())->getJSONDecodedBody();

                            $template = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder(
                                'Welcome to Taberuba Official Account',
                                'Connect your Taberuba account with LINE',
                                asset('og-taberuba.jpg'),
                                [
                                    new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder('Link Account', route('member-login', ['linkToken' => $linkToken['linkToken']])),
                                ]
                            );

                            $templateMessage = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder('Link Account Taberuba', $template);
                            // push message
                            $lineBot->pushMessage($event->getUserId(), $templateMessage);
                        }

                    }
                }

                // handle follow event
                if ($event instanceof \LINE\LINEBot\Event\FollowEvent) {
                    // get user profile
                    $userProfile = $lineBot->getProfile($event->getUserId())->getJSONDecodedBody();

                    // send welcome message in japanese
                    $textMessageBuilder = new TextMessageBuilder('こんにちは！'.$userProfile['displayName'].'さん。');
                    $lineBot->replyMessage($event->getReplyToken(), $textMessageBuilder);

                    // create link token
                    $linkToken = $lineBot->createLinkToken($event->getUserId())->getJSONDecodedBody();

                    $template = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder(
                        'Welcome to Taberuba Official Account',
                        'Connect your Taberuba account with LINE',
                        asset('og-taberuba.jpg'),
                        [
                            new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder('Link Account', route('member-login', ['linkToken' => $linkToken['linkToken']])),
                        ]
                    );

                    $templateMessage = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder('Link Account Taberuba', $template);
                    // push message
                    $lineBot->pushMessage($event->getUserId(), $templateMessage);
                }

                // handle link account
                if ($event instanceof \LINE\LINEBot\Event\AccountLinkEvent) {
                    if ($event->getResult() == 'ok') {
                        $nonceToken = $event->getNonce();

                        //get profile LINE
                        $userProfile = $lineBot->getProfile($event->getUserId())->getJSONDecodedBody();

                        // find member by nonce token
                        $member = Member::where('line_nonce_token', $nonceToken)->first();

                        // update member line id
                        $member->line_id = $event->getUserId();
                        $member->line_display_name = $userProfile['displayName'];
                        $member->save();

                        $textMessageBuilder = new TextMessageBuilder('Your Account Taberuba with Email ' . $member->email  .' has been linked');
                        $lineBot->replyMessage($event->getReplyToken(), $textMessageBuilder);
                    }
                }

            }
        } catch (Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return;
        }

        return;
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
        $textMessageBuilder = new TextMessageBuilder($msg);
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
        $textMessageBuilder = new TextMessageBuilder($msg);
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
        $textMessageBuilder = new TextMessageBuilder($msg);
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
