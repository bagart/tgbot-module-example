<?php

declare(strict_types=1);

use BAGArt\TelegramBot\Modules\TgModuleCapability;
use BAGArt\TelegramBotExample\ExampleMessageProcessor;
use BAGArt\TelegramBotExample\ExampleModule;
use BAGArt\TelegramBotExample\ExampleOutboundMiddleware;
use BAGArt\TelegramBotExample\ExamplePingCommandProcessor;
use BAGArt\TelegramBotExample\ExampleValidationRule;

test('descriptor exposes the example module identity', function () {
    $descriptor = ExampleModule::descriptor();

    expect($descriptor->id)->toBe('example')
        ->and($descriptor->name)->toBe('Example')
        ->and($descriptor->version)->toBe('1.0.0')
        ->and($descriptor->defaultEnabled)->toBeTrue();
});

test('descriptor declares every component kind the template demonstrates', function () {
    $capabilities = array_map(
        static fn (TgModuleCapability $capability): string => $capability->value,
        ExampleModule::descriptor()->capabilities,
    );

    expect($capabilities)->toContain(
        TgModuleCapability::Processor->value,
        TgModuleCapability::Rule->value,
        TgModuleCapability::Middleware->value,
        TgModuleCapability::Command->value,
    );
});

test('descriptor declares no module dependencies', function () {
    expect(ExampleModule::descriptor()->requiresModules)->toBe([]);
});

test('template classes referenced by the module are loadable', function () {
    expect(class_exists(ExampleMessageProcessor::class))->toBeTrue()
        ->and(class_exists(ExampleValidationRule::class))->toBeTrue()
        ->and(class_exists(ExampleOutboundMiddleware::class))->toBeTrue()
        ->and(class_exists(ExamplePingCommandProcessor::class))->toBeTrue();
});
