<?php

namespace App\Http\Telegram;


use App\Models\State;
use App\Models\User;
use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use function Psy\debug;

class TgRegistrationConversion extends Conversation {

    protected ?string $step = 'startConversation';

    public $_name;

    public function startConversation(Nutgram $bot)
    {

        $id = $bot->chatId();
        $tgUser = $bot->user();
        $user = User::where('chat_id', $id)->first();
        if($user){
            $bot->sendMessage('Chat ID:' . $id);
        }else{
            $bot->sendMessage('Ваш айди: '. $tgUser->username .' Давайте знакомиться. Как вас зовут?');
            $this->next('askName');
        }
    }

    public function askName(Nutgram $bot){
        $this->_name = $bot->message()->text;
        $bot->sendMessage('Привет, ' . $this->_name );
    }

}
