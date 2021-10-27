<?php

declare(strict_types=1);

use Termage\Termage;
use function Termage\underline;

test('test underline', function (): void {
    $value = underline('RAD')->render();
    expect($value)->toBe("\e[4mRAD\e[24m");
});