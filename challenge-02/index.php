<?php

function noIterate($strArr)
{
    $strLength = strlen($strArr[1]);
    $maxIndex = strlen($strArr[0]);

    while ($strLength <= $maxIndex)
    {
        for ($i=0; $i <= $strLength ; $i++)
        { 
            $origSample = str_split($strArr[1]);
            $newSample = str_split(substr($strArr[0], $i, $strLength));
            $newSampleCopy = implode($newSample);
            $hits = 0;

            foreach ($origSample as $val)
            {
               if (in_array($val, $newSample))
               {
                   array_splice($newSample, array_search($val, $newSample), 1);
                   $hits += 1;
               }

            }
            if (count($origSample) == $hits) return $newSampleCopy;
        }
        $strLength += 1;
    }
    return "hey";
}

// keep this function call here
echo noIterate(["ahffaksfajeeubsne", "jefaa"]); // "aksfaje"
echo "\r\n";
echo noIterate(["aksfaje", "jefaa"]); // "aksfaje"
echo "\r\n";
echo noIterate(["aaffhkksemckelloe", "fhea"]); # "affhkkse"
