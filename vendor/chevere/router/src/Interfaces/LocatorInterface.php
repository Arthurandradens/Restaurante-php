<?php

/*
 * This file is part of Chevere.
 *
 * (c) Rodolfo Berrios <rodolfo@chevere.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Chevere\Router\Interfaces;

use Stringable;

/**
 * Describes the component in charge of defining a route name.
 */
interface LocatorInterface extends Stringable
{
    public function repository(): string;

    public function path(): string;
}
