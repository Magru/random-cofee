<?php

namespace App\Http\Webhooks;

use App\Models\User;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Facades\Log;


class BotHandler extends WebhookHandler
{
    public function start(): void
    {
        Log::debug('start action');

        $this->chat->message('hello world')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Начнем ?')->action('/register')->param('notification-id', '455552'),
            ]))->send();
    }

    public function action_register(){

        Log::debug('register action');

        $chat = TelegraphChat::find(41364458254);
        $chat->message('hello')->send();
        $chat->html("<b>hello<b>\n\nI'm a bot!")->send();
        $chat->markdown('*hello*')->send();

    }

}
