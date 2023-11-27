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

namespace Chevere\Throwable\Exceptions;

use Chevere\Throwable\Interfaces\ThrowableInterface;
use Chevere\Throwable\Traits\ExceptionTrait;

/**
 * Exception thrown if a length is invalid.
 */
class LengthException extends \LengthException implements ThrowableInterface
{
    use ExceptionTrait;
}