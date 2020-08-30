<?php


namespace App\classes;



class Helper
{
    public  static function filter($data){
        $data = trim($data);
        $data = stripslashes($data);
        #$data = htmlspecialchars($data);
        $filter =FILTER_SANITIZE_STRING;
        $flags = FILTER_FLAG_NO_ENCODE_QUOTES;
        $data = filter_var($data, $filter, $flags);
        return $data;
    }
    public static function textShorten($text, $limit = 400){
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text.".....";
        return $text;
    }
    public static function formatDate($date){
        return date('F j, Y, g:i a', strtotime($date));
    }
}