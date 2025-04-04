<?php

declare(strict_types= 1);

namespace Sbintech\Manipulation\Classes;
use Sbintech\Manipulation\Interface\FormatterInterface;


class FormatterContext
{
    private FormatterInterface $formatter;

    public function setFormatter(FormatterInterface $formatter): void
    {
        $this->formatter = $formatter;
    }

    public function format(float|string $value, string $type, bool $boolean = false): mixed
    {
        if(!isset($this->formatter)) {
            throw new \Exception(message: "Error: Not define Formatter");
        }

        return $this->formatter->format(value: $value, type: $type, boolean: $boolean);
    }
}