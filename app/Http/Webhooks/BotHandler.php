<?php

namespace App\Http\Webhooks;

use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Models\TelegraphBot;
use DefStudio\Telegraph\Models\TelegraphChat;

class BotHandler extends WebhookHandler
{
    public function start(): void
    {


        $this->chats()->create([
            'chat_id' => $this->chat->chat_id,
            'name' => 'Hello',
        ]);


        $this->chat->markdown("*Hi* happy to be here!")->send();
    }
}
