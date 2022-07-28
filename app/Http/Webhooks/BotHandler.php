<?php

namespace App\Http\Webhooks;

use App\Models\User;
use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use DefStudio\Telegraph\Models\TelegraphBot;
use DefStudio\Telegraph\Models\TelegraphChat;
use DefStudio\Telegraph\Telegraph;

class BotHandler extends WebhookHandler
{
    public function start(): void
    {
        if(!User::where('chat_id', $this->chat->chat_id)->exists()){
            $user = new User;
            $user->chat_id = $this->chat->chat_id;
            $user->name = 'User Name';
            $user->email = null;
            $user->password = null;
            $user->save();

            $user->assignRole('tg_user');
        }



        $this->chat->message('hello world')
            ->keyboard(function(Keyboard $keyboard){
                return $keyboard
                    ->button('Custom action')->action('register')->param('id', '42');
            })->send();

    }

    public function register(): void{

        $this->reply("Notification dismissed")->send();
        $key1 = $this->data->get('id');
        $chat = TelegraphChat::find(136445825);
        $chat->html("<b>hello<b>\n\nI'm a bot!" . $key1)->send();



    }

}
