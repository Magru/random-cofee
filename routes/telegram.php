<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;

/*
|--------------------------------------------------------------------------
| Nutgram Handlers
|--------------------------------------------------------------------------
|
| Here is where you can register telegram handlers for Nutgram. These
| handlers are loaded by the NutgramServiceProvider. Enjoy!
|
*/

$bot->onCommand('start', function (Nutgram $bot) {


    return $bot->menuText('Choose a color:')
        ->addButtonRow(InlineKeyboardButton::make('Red', callback_data: 'red@handleColor'))
        ->addButtonRow(InlineKeyboardButton::make('Green', callback_data: 'green@handleColor'))
        ->addButtonRow(InlineKeyboardButton::make('Yellow', callback_data: 'yellow@handleColor'))
        ->orNext('none')
        ->showMenu();


})->description('The start command!');
