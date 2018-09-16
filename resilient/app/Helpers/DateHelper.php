<?php
/**
 * Created by PhpStorm.
 * User: Andres Muñoz
 * Date: 15/09/2018
 * Time: 08:21 PM
 */

namespace App\Helpers;


class DateHelper
{
    public function getDiffDatesUntilNow($endDate)
    {

        $d1 = new DateTime();
        $d1->setTimestamp($endDate);
        $d2 = new DateTime('now');

        $diff = $d2->diff($d1);

        return $diff;
    }
}