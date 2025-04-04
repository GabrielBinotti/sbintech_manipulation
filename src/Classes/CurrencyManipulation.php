<?php

namespace Sbintech\Manipulation\Classes;

use Sbintech\Manipulation\Interface\FormatterInterface;


class CurrencyManipulation implements FormatterInterface
{
    public function format(float|string $value, string $type, bool $boolean = false): mixed
    {

        $value = $this->normalize(value: $value);

        if (!is_numeric(value: $value)) {
            throw new \Exception(message: "Error: Value is not numeric!");
        }

        $value = (float) $value;

        switch (strtoupper(string: $type)) {
            case 'BR':
                $value = number_format(num: $value, decimals: 2, decimal_separator: ',', thousands_separator: '.');
                if ($boolean) {
                    $value = "R$ {$value}";
                }
                break;
            case 'US':
                $value = number_format(num: $value, decimals: 2, decimal_separator: '.', thousands_separator: ',');
                if ($boolean) {
                    $value = "$ {$value}";
                }
                break;
            default:
                throw new \Exception(message: "Error: Not defined Country {$type}!");
        }

        return $value;
    }


    private function normalize(string $value): string
    {
        $value = trim(string: $value);

        if (strpos(haystack: $value, needle: ",") && strpos(haystack: $value, needle: ".") !== false) {

            if (strrpos(haystack: $value, needle: ",") > strrpos(haystack: $value, needle: ".")) {
                $value = str_replace(search: ".", replace: "", subject: $value);
                $value = str_replace(search: ",", replace: ".", subject: $value);
            } else {
                $value = str_replace(search: ",", replace: "", subject: $value);
            }
        } else if (strpos(haystack: $value, needle: ",") !== false) {
            $value = str_replace(search: ",", replace: "", subject: $value);
        }

        return $value;
    }

}