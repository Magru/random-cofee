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
        $response = Telegram::getWebhookDebugInfo()->send();
        Log::info($response);
    }

    public function delete(){
        Log::info('delete action');

    }


}
