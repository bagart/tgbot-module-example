<?php

declare(strict_types=1);

/**
 * Local dev fixture module manifest. Required once by the `example` entry in
 * config/tg_modules.php (standalone by design: the module owns its sources
 * and requires no composer autoload changes) and booted by the module engine.
 */

require_once __DIR__.'/src/ExampleMessageProcessor.php';
require_once __DIR__.'/src/ExampleModule.php';
require_once __DIR__.'/src/ExampleOutboundMiddleware.php';
require_once __DIR__.'/src/ExamplePingCommandProcessor.php';
require_once __DIR__.'/src/ExampleValidationRule.php';

return [
    'provider' => \BAGArt\TelegramBotExample\ExampleModule::class,
];
