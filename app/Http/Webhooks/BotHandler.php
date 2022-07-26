<?php

namespace App\Http\Webhooks;

use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Models\TelegraphBot;
use DefStudio\Telegraph\Models\TelegraphChat;

class BotHandler extends WebhookHandler
{
    public function start(): void
    {
        $chat_id = $this->chat->chat_id;
        $bot = TelegraphBot::fromId(1);

        $this->chat->markdown('Hello')->send();
    }
}
