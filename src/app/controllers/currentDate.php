<?php
class currentDate
{
    public static function getDate(): string
    {
        try {
            date_default_timezone_set('Europe/Paris');
            $date = date('d/m/y');
            return $date;
        } catch (Exception $e) {
            die('Error to get current date: ' . $e->getMessage());
        }
    }
}
