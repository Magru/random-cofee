<?php

namespace App\Http\Telegram;


use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use function Psy\debug;

class TgRegistrationConversion extends Conversation
{

    protected ?string $step = 'startConversation';

    public $_name;
    public $_username;
    public $_chatId;
    public $_state;

    public function startConversation(Nutgram $bot)
    {

        $this->_chatId = $bot->chatId();
        $user = User::where('chat_id', $this->_chatId)->first();
        if ($bot->user()) {
            $this->_username = $bot->user()->username;
        }
        $bot->sendMessage('Привет');
        if ($user) {
            $this->next('askState');

        } else {
            $this->next('askName');
        }
    }

    public function askName(Nutgram $bot)
    {
        $bot->sendMessage('askName');
//        $this->_name = $bot->message()->text;
//
//        $user = new User();
//        $user->name = $this->_name;
//        $user->email = 'tg@tg.com';
//        $user->tg_user_name = $this->_username;
//        $user->password = Hash::make(Str::random(8));
//        $user->chat_id = $this->_chatId;
//        $user->save();
//
//        $bot->sendMessage('Привет, ' . $this->_name . 'ID: ' . $user->id);


    }

    public function askState(Nutgram $bot)
    {

        //$this->_state = $bot->callbackQuery()->data;

        $bot->sendMessage('askState');
    }

}
