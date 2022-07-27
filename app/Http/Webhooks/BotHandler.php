<?php

namespace App\Http\Webhooks;

use App\Models\User;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Keyboard\ReplyButton;
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
        }


        $this->chat->message('Hello new user')->keyboard(Keyboard::make()->buttons([
            Button::make('Начнем ?')->action('/bibaboba')->param('id', '42'),
            Button::make('URL')->url('https://test.it'),
            ReplyButton::make('foo')->requestPoll(),
            ReplyButton::make('bar')->requestQuiz(),
        ]))->send();

    }

    public function bibaboba(){
        $this->chat->reply('ssd');
    }

}
