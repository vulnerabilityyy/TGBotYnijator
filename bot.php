<?php

// PHP 8.2+ is required.

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';

require('vendor/autoload.php');

use \utils\Logger as BotLogger;
use \event\EventHandler;
use \danog\MadelineProto\Settings;
use \danog\MadelineProto\Logger;
use \danog\MadelineProto\Settings\{
    AppInfo,
    Logger as LoggerSettings
};

$settings = (new Settings)
->setAppInfo((new AppInfo)
    ->setApiId(1000000)
    ->setApiHash(''
))
->setLogger((new LoggerSettings())
    ->setLevel(Logger::LEVEL_ERROR)
    ->setType(Logger::FATAL_ERROR)
);

BotLogger::info('Бот успешно запустился!');

EventHandler::startAndLoop(
    'session.madeline',
    $settings
);