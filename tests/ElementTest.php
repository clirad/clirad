<?php

declare(strict_types=1);

use Clirad\Clirad;
use Clirad\Components\Element;
use Symfony\Component\Console\Output\ConsoleOutput as Renderer;

test('test el helper', function (): void {
    $this->assertInstanceOf(Element::class, el());
});

test('test render', function (): void {
    $value = el('RAD')->render();
    expect($value)->toEqual('RAD'); 
});

test('test color', function (): void {
    $value = el('asd')->color('blue')->render();
    expect($value)->toBe('<fg=blue;>asd</>'); 
});
