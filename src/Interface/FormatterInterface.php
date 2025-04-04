<?php

declare(strict_types=1);

namespace Sbintech\Manipulation\Interface;

interface FormatterInterface
{
    public function format(float|string $value, string $type, bool $boolean = false): mixed;
}