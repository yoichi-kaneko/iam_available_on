<?php

namespace App\Queries;

use Yasumi\Yasumi;

class HolidayQuery
{

    /**
     * 休日を取得する。アプリの性質上、指定した月と翌月の2ヶ月分を返す
     * @param int $year 対象の年
     * @param int $month 対象の月
     * @return array
     */
    public static function get($year = null, $month = null)
    {
        if(is_null($year)) {
            $year = date('Y');
        }
        if(is_null($month)) {
            $month = date('m');
        }
        $holiday_list = [];
        $start = date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
        $end = date('Y-m-d', mktime(0, 0, 0, $month + 2, 0, $year));

        $all_holiday_list = self::getAllHolidayList($year, $month);
        // 対象の祝日リストから、対象期間の日付のみを対象にする。
        foreach ($all_holiday_list as $holiday) {
            if(strtotime($holiday) >= strtotime($start) && strtotime($holiday) <= strtotime($end)) {
                $holiday_list[] = date('Y-m-d', strtotime($holiday));
            }
        }
        return $holiday_list;
    }

    private static function getAllHolidayList($year, $month)
    {
        $holiday_array = [];
        $holidays = Yasumi::create('Japan', $year, 'ja_JP');
        foreach($holidays as $holiday) {
            $holiday_array[] = (string)$holiday;
        }
        // 12月の場合のみ、翌年の祝日も取得する
        if($month == 12) {
            $holidays = Yasumi::create('Japan', $year + 1, 'ja_JP');
            foreach($holidays as $holiday) {
                $holiday_array[] = (string)$holiday;
            }
        }

        return $holiday_array;
    }

}
