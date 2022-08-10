<?php

namespace App\Http\Telegram;


use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
    public $_user;

    public function startConversation(Nutgram $bot)
    {

        $this->_chatId = $bot->chatId();
        $user = User::where('chat_id', $this->_chatId)->first();
        if ($bot->user()) {
            $this->_username = $bot->user()->username;
        }
        $bot->sendMessage('Привет!');
        if ($user) {
            $this->_user = $user;
            if(!$user->state()->exists()){
                $states = State::all();
                $inlineKeyboard = InlineKeyboardMarkup::make();
                if($states){
                    foreach ($states as $_state){
                        $inlineKeyboard->addRow(InlineKeyboardButton::make($_state->name, callback_data: $_state->id));
                    }
                }
                $bot->sendMessage('Из какого района вы ?', [
                    'reply_markup' => $inlineKeyboard
                ]);
                $this->next('askState');
            }

        } else {
            $bot->sendMessage('Привет. Как вас зовут ?');
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
        $this->_user = $user;

        $bot->sendMessage('Привет, ' . $this->_name . 'ID: ' . $user->id);


    }

    public function askState(Nutgram $bot)
    {
        $this->_state = $bot->callbackQuery()->data;
        $this->_user->state->fill($this->_state);
        $this->_user->save();
        $bot->sendMessage('State: ' . $this->_state);
    }

}
