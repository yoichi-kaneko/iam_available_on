<?php

namespace App\Queries;

use App\Models\UserSchedule;
use App\Models\UserSetting;
use App\Queries\HolidayQuery;

class CalendarDataQuery
{

    /**
     * @param string $user_code 対象のユーザコード
     * @return array
     */
    public static function fetch($user_code)
    {
        $user_setting = UserSetting::where('user_code', $user_code)->first();
        if (empty($user_setting)) {
            return false;
        }
        $date_range = self::getDateRange();
        $holidays = HolidayQuery::get();
        $calendar_data = [
            'date_range' => $date_range,
            'holidays' => $holidays,
            'schedules' => self::makeScheduleData($date_range, $user_setting, $holidays)
        ];

        return $calendar_data;
    }

    /**
     * 対象となる日付のレンジを取得する。
     * 対象となるのは、当日から翌月の末日まで
     */
    private static function getDateRange()
    {
        $today = date('Y-m-d');
        $start = date('Y-m-01');
        $end = date('Y-m-d', mktime(0, 0, 0, date('m') + 2, 0, date('Y')));
        return ['today' => $today, 'start' => $start, 'end' => $end];
    }
    /**
     * それぞれの日のスケジュール情報を取得する
     * @param array $date_range 日付のレンジ
     * @param object $user_setting UserSetting
     * @param array $holidays 祝日のリスト
     * @return array それぞれの日についてまとめた多元配列
     */
    private static function makeScheduleData($date_range, $user_setting, $holidays)
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
         * comment: 説明文
         *
         */
        $schedule_array = [];

        $calendar_data_array = self::getCalendarData($user_setting->user_id, $date_range['start'], $date_range['end']);

        $current_day = $date_range['today'];

        $id = 1;

        while ($current_day <= $date_range['end']) {
            if(!empty($calendar_data_array[$current_day])) {
                $calendar_data = $calendar_data_array[$current_day];
            } else {
                $calendar_data = self::createCalendar($user_setting, $current_day, $holidays);
            }
            $tmp = [
                'id' => $calendar_data->id,
                'date' => $current_day,
                'status' => $calendar_data->status,
                'comment' => $calendar_data->comment,
            ];

            $schedule_array[] = $tmp;
            $current_day = date('Y-m-d', strtotime($current_day . ' + 1 Day'));
            $id++;
        }

        return $schedule_array;
    }

    /**
     * カレンダーのデータを取得する
     * @param int $user_id ユーザID
     * @param date $start 取得の開始時刻
     * @param date $end 取得の終了時刻
     * @return array 結果情報
     */
    private static function getCalendarData($user_id, $start, $end)
    {
        $return = [];

        $schedules = UserSchedule::where('user_id', $user_id)->whereBetween('date', [$start, $end])->get();

        foreach ($schedules as $schedule) {
            $date = date('Y-m-d', strtotime($schedule->date));
            $return[$date] = $schedule;
        }
        return $return;
    }

    /**
     * カレンダーのデータを保存し、それを返す
     * @param object $user_setting UserSetting
     * @param date $date 日付
     * @param array $holidays 祝日リスト
     * @return object UserSchedule
     */
    private static function createCalendar($user_setting, $date, $holidays)
    {
        // 曜日が土日か祝日一覧にある場合、祝日用のステータスをセットする。そうでなければ平日のステータスをセットする。
        $week = date('w', strtotime($date));
        if (in_array($week, [0, 6]) || in_array($date, $holidays)) {
            $status = $user_setting->holiday_default_status;
        } else {
            $status = $user_setting->weekday_default_status;
        }
        return UserSchedule::create([
            'user_id' => $user_setting->user_id,
            'date' => $date,
            'status' => $status
        ]);
    }
}
