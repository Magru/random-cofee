<?php

namespace App\Http\Webhooks;

use App\Models\User;
use DefStudio\Telegraph\DTO\InlineQuery;
use DefStudio\Telegraph\DTO\InlineQueryResultPhoto;
use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use DefStudio\Telegraph\Models\TelegraphBot;
use DefStudio\Telegraph\Models\TelegraphChat;
use DefStudio\Telegraph\Telegraph;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;


class BotHandler extends WebhookHandler
{
    public function start(): void
    {
        $this->chat->message('hello world')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Delete')->action('handleInlineQuery')->param('id', '42'),
                Button::make('open')->url('https://test.it'),
                Button::make('Web App')->webApp('https://web-app.test.it'),
            ]))->send();
    }

        public function handleInlineQuery(InlineQuery $inlineQuery): void
    {
        $query = $inlineQuery->query(); // "pest logo"

        $logo = 'aaa'; // the code to handle the query. just an example here

        $this->bot->answerInlineQuery($inlineQuery->id(), [
            InlineQueryResultPhoto::make($logo."-light", "https://logofinder.dev/$logo/light.jpg", "https://logofinder.dev/$logo/light/thumb.jpg")
                ->caption('Light Logo'),
            InlineQueryResultPhoto::make($logo."-dark", "https://logofinder.dev/$logo->id/dark.jpg", "https://logofinder.dev/$logo/dark/thumb.jpg")
                ->caption('Light Logo'),
        ])->send();
    }


}
