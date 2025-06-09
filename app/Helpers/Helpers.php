<?php
namespace App\Helpers;

use DateTime;

class Helpers{

    public static function formatDate($dateString, $format = 'Y-m-d')
    {
        $date = new DateTime($dateString);
        return $date->format($format);
    }

}
