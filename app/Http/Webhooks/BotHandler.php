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
use Illuminate\Support\Facades\Log;

class BotHandler extends WebhookHandler
{
    public function start(): void
    {
        $this->chat->message('hello world')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Delete')->action('delete')->param('id', '42'),
                Button::make('open')->url('https://test.it'),
                Button::make('Web App')->webApp('https://web-app.test.it'),
            ]))->send();
    }

    public function delete(){
        Log::info('delete action');

    }


}
