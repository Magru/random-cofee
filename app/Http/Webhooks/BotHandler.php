<?php

namespace App\Http\Webhooks;

use App\Models\User;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use Illuminate\Support\Facades\Log;


class BotHandler extends WebhookHandler
{
    public function start(): void
    {
        Log::debug('start action');

        $this->chat->message('hello world')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Начнем ?')->action('register')->param('notification-id', '455552'),
            ]))->send();
    }

    public function dismiss(){

        Log::debug('register action');

        $notificationId = $this->callbackQuery->data()->get('notification-id'); //42
        Log::debug($notificationId);

    }

}
