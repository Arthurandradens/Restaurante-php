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

namespace Chevere\Throwable\Errors;

use Chevere\Throwable\Interfaces\ThrowableInterface;
use Chevere\Throwable\Traits\ExceptionTrait;

/**
 * Thrown when the type of an argument is correct but the value of it is incorrect.
 *
 * For example, passing a negative integer when the function expects a positive one,
 * or passing an empty string/array when the function expects it to not be empty.
 */
final class ValueError extends \ValueError implements ThrowableInterface
{
    use ExceptionTrait;
}
