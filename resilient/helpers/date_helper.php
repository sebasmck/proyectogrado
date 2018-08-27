<?php

function getDiffDates($endDate){

    $d1 = new DateTime();
    $d1->setTimestamp($endDate);
    $d2 = new DateTime('now');
    
    $diff = $d2->diff($d1);
    
    return $diff;
}