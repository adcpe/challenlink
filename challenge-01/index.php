<?php

function splitStr($str)
{
    return preg_split("/, /", $str);
}

function findPoint($strArr)
{
    $newArr = array_map ("splitStr", $strArr);
    return implode(",", array_intersect($newArr[0], $newArr[1]));
}

// keep this function call here
echo findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']); // "1,4,13"
echo "\r\n";
echo findPoint(['1, 3, 9, 10, 17, 18', '1, 4, 9, 10']); // "1,9,10"

