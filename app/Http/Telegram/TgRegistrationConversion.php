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

    public function startConversation(Nutgram $bot)
    {

        $this->_chatId = $bot->chatId();
        $user = User::where('chat_id', $this->_chatId)->first();
        if ($user) {
            $this->next('askState');
            //$bot->sendMessage('Chat ID:' . $this->_chatId);
        } else {
            if ($bot->user()) {
                $this->_username = $bot->user()->username;
            }
            $bot->sendMessage('Давайте знакомиться. Как вас зовут?');
            $this->next('askName');
        }
    }

    public function askName(Nutgram $bot)
    {
        $this->_name = $bot->message()->text;

        $user = new User();
        $user->name = $this->_name;
        $user->email = 'tg@tg.com';
        $user->tg_user_name = $this->_username;
        $user->password = Hash::make(Str::random(8));
        $user->chat_id = $this->_chatId;
        $user->save();

        $bot->sendMessage('Привет, ' . $this->_name . 'ID: ' . $user->id);


    }

    public function askState(Nutgram $bot)
    {

        $states = State::all();
        $keyboardMarkup = InlineKeyboardMarkup::make();
        if($states){
            foreach ($states as $_s){
                $keyboardMarkup->addRow(InlineKeyboardButton::make($_s->name, callback_data: $_s->id));
            }
        }


        $bot->sendMessage('How big should be you ice cream cup?', [
            'reply_markup' => $keyboardMarkup
        ]);
        $this->end();
    }

}
