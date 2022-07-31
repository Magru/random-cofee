<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Http\Telegram\TgRegistrationConversion;

/*
|--------------------------------------------------------------------------
| Nutgram Handlers
|--------------------------------------------------------------------------
|
| Here is where you can register telegram handlers for Nutgram. These
| handlers are loaded by the NutgramServiceProvider. Enjoy!
|
*/



$bot->onCommand('start', TgRegistrationConversion::class);
