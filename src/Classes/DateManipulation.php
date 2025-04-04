<?php

declare(strict_types=1);

namespace Sbintech\Manipulation\Classes;
use Sbintech\Manipulation\Interface\FormatterInterface;


class DateManipulation implements FormatterInterface
{
    public function format(float|string $value, string $type, bool $boolean = false): mixed
    {

        try {

            $date = new \DateTime(datetime: $value);

        } catch (\Exception $th) {
            $date = \DateTime::createFromFormat(format: "Y-m-d H:i:s", datetime: $value) ?:
                \DateTime::createFromFormat(format: "Y-m-d", datetime: $value);
        }

        if(!$date){
            throw new \Exception(message: "Error: invalid date: $value");
        }

        if (strtoupper(string: $type) == "BR"){
            $timezone = new \DateTimeZone(timezone: "America/Sao_Paulo");
            $format = $boolean ? "d/m/Y H:i:s" : "d/m/Y";
        }else{
            throw new \Exception(message: "Error: invalid type: $type");
        }

        $date->setTimezone(timezone: $timezone);

        return $date->format(format: $format);
    }


    public static function dateDiff(string $date1, string $date2): int
    {
        try {
            $dt1 = new \DateTime(datetime: $date1);
            $dt2 = new \DateTime(datetime: $date2);
        } catch (\Throwable $th) {
            throw new \Exception(message: "Error: invalid dates!");   
        }

        return (int) $dt1->diff(targetObject: $dt2)->days;
    }


    public static function add(string $date, int $value, string $type = 'days'): string
    {
        try {
            $dt = new \DateTime(datetime: $date);
        } catch (\Throwable $th) {
            throw new \Exception(message: "Error: invalid date $date!");   
        }

        $dt->modify(modifier: "+{$value} $type");

        
        return ($type == "hours") ? $dt->format(format: "Y-m-d H:i:s") : $dt->format(format: "Y-m-d");
    }
}