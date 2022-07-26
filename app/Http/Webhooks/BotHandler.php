<?php

namespace App\Http\Webhooks;

use DefStudio\Telegraph\Handlers\WebhookHandler;

class BotHandler extends WebhookHandler
{
    public function start(): void
    {
        $this->chat->markdown("*Hi* happy to be here!")->send();
    }
}
