<?php

declare(strict_types=1);

/**
 * Termage - Totally RAD Terminal styling for PHP! (https://digital.flextype.org/termage/)
 * Copyright (c) Sergey Romanenko (https://awilum.github.io)
 *
 * Licensed under The MIT License.
 *
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 */

namespace Termage\Elements;

use Termage\Base\Element;

use const PHP_EOL;

final class Paragraph extends Element
{
    public function render(): string
    {
        return parent::render() . PHP_EOL;
    }
}
