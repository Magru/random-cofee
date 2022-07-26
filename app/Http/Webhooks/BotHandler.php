<?php

namespace App\Http\Webhooks;

use App\Models\User;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Models\TelegraphBot;
use DefStudio\Telegraph\Models\TelegraphChat;

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


            $this->chat->markdown('Hello new user')->send();
        }


    }
}
