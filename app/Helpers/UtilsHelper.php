<?php

namespace App\Helpers;

use Carbon\Carbon;

class UtilsHelper
{
    public static function dateRangToDates($dateRange)
    {
        $startDate = Carbon::now();
        $endDate = Carbon::now();
        $startDateDMY = $startDate->copy()->format('d/m/Y');
        $endDateDMY = $endDate->copy()->format('d/m/Y');
        $startDateYMD = $startDate->copy()->format('Y-m-d');
        $endDateYMD = $endDate->copy()->format('Y-m-d');

        if (!empty($dateRange)) {
            $splits = explode('-', $dateRange);
            if (count($splits) == 2) {
                $startDateDMY = trim($splits[0]);
                $endDateDMY = trim($splits[1]);

                $startDate = Carbon::createFromFormat('d/m/Y', $startDateDMY);
                $endDate = Carbon::createFromFormat('d/m/Y', $endDateDMY);

                $startDateYMD = $startDate->copy()->format('Y-m-d');
                $endDateYMD = $endDate->copy()->format('Y-m-d');
            }
        }

        return [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'startDateDMY' => $startDateDMY,
            'endDateDMY' => $endDateDMY,
            'startDateYMD' => $startDateYMD,
            'endDateYMD' => $endDateYMD,
        ];
    }
}
