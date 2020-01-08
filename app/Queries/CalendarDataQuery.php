<?php

namespace App\Queries;

use App\Queries\HolidayQuery;

class CalendarDataQuery
{

    /**
     * @param string $user_code 対象のユーザコード
     * @return array
     */
    public static function fetch($user_code)
    {
        $date_range = self::getDateRange();
        $calendar_data = [
            'date_range' => $date_range,
            'holidays' => HolidayQuery::get(),
            'schedules' => self::makeScheduleData($date_range)
        ];

        return $calendar_data;
    }

    /**
     * 対象となる日付のレンジを取得する。
     * 対象となるのは、当日から翌月の末日まで
     */
    private static function getDateRange()
    {
        $start = date('Y-m-01');
        $end = date('Y-m-d', mktime(0, 0, 0, date('m') + 2, 0, date('Y')));
        return ['start' => $start, 'end' => $end];
    }
    /**
     * それぞれの日のスケジュール情報を取得する
     * @param array $date_range
     */
    private static function makeScheduleData($date_range)
    {
        /*
         * 取得のアルゴリズムは次の通り。
         *
         * ・対象となる期間の日付ごとに一行データを用意する。
         * ・それぞれの日に対して、次のフィールドを持たせる
         *
         * id: 管理ID
         * date: 日付
         * status: ステータス。1, 2, 3のいずれか
         * description: 説明文
         *
         */
        $schedule_array = [];

        // TODO: まずはDB接続を行わずにデータ生成を書き出す。DBからの取得は別途作成する。

        $current_day = date('Y-m-d');

        $id = 1;

        while ($current_day <= $date_range['end']) {
            $tmp = [
                'id' => $id,
                'date' => $current_day,
                'status' => $id % 3 + 1,
                'description' => 'desc ' . $id,
            ];
            $schedule_array[] = $tmp;
            $current_day = date('Y-m-d', strtotime($current_day . ' + 1 Day'));
            $id++;
        }

        return $schedule_array;
    }
}
