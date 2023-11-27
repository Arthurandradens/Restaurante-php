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

namespace Chevere\Parameter\Interfaces;

use Chevere\Throwable\Exceptions\InvalidArgumentException;

/**
 * Describes the component in charge of defining a parameter of type float.
 */
interface FloatParameterInterface extends ParameterInterface
{
    public const MINIMUM = -PHP_FLOAT_MIN;

    public const MAXIMUM = PHP_FLOAT_MAX;

    /**
     * Return an instance with the specified `$default` value.
     *
     * This method MUST retain the state of the current instance, and return
     * an instance that contains the specified `$default` value.
     *
     * @throws InvalidArgumentException
     */
    public function withDefault(float $value): self;

    /**
     * Return an instance with the specified minimum value.
     *
     * This method MUST retain the state of the current instance, and return
     * an instance that contains the specified minimum value.
     *
     * @throws InvalidArgumentException
     */
    public function withMinimum(float $value): self;

    /**
     * Return an instance with the specified maximum value.
     *
     * This method MUST retain the state of the current instance, and return
     * an instance that contains the specified maximum value.
     *
     * @throws InvalidArgumentException
     */
    public function withMaximum(float $value): self;

    /**
     * Return an instance with the specified accepted value(s).
     *
     * This method MUST retain the state of the current instance, and return
     * an instance that contains the specified accepted value(s).
     *
     * When using this method it will nullify the minimum and maximum values.
     *
     * @throws InvalidArgumentException
     */
    public function withAccept(float ...$value): self;

    /**
     * Provides access to the default value (if any).
     */
    public function default(): ?float;

    /**
     * Provides access to the minimum value.
     */
    public function minimum(): ?float;

    /**
     * Provides access to the maximum value.
     */
    public function maximum(): ?float;

    /**
     * Provides access to the accepted value(s).
     *
     * @return float[]
     */
    public function accept(): array;

    public function assertCompatible(self $parameter): void;
}