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
    public $_state;
    public $_city;


    public $cupSize;

    public function startConversation(Nutgram $bot)
    {

        $id = $bot->chatId();
        $user = User::where('chat_id', $id)->first();
        if($user){
            $bot->sendMessage('Chat ID:' . $id);
        }else{

            $bot->sendMessage('Давайте знакомиться. Как вас зовут?');
            $this->_name = $bot->message()->text;
            $bot->sendMessage('Привет, ' . $this->_name . ':)');
            //$this->next('askState');
        }
    }

    public function askState(Nutgram $bot){

        $states = State::all();


        $bot->sendMessage('Из какого района вы? ', [
            'reply_markup' => InlineKeyboardMarkup::make()
                ->addRow(InlineKeyboardButton::make('Small', callback_data: 'S'), InlineKeyboardButton::make('Medium', callback_data: 'M'))
                ->addRow(InlineKeyboardButton::make('Big', callback_data: 'L'), InlineKeyboardButton::make('Super Big', callback_data: 'XL')),
        ]);
        $this->next('askFlavors');
    }

    public function askCity(Nutgram $bot){

    }



    public function askFlavors(Nutgram $bot)
    {
        // if is not a callback query, ask again!
        if (!$bot->isCallbackQuery()) {
            $this->askCupSize($bot);
            return;
        }

        $this->cupSize = $bot->callbackQuery()->data;

        $bot->sendMessage('What flavors do you like?');
        $this->next('recap');
    }

    public function recap(Nutgram $bot)
    {
        $flavors = $bot->message()->text;
        $bot->sendMessage("You want an $this->cupSize cup with this flavors: $flavors");
        $this->end();
    }
}
