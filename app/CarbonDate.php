<?php

namespace App;

use Carbon\Carbon;

class CarbonDate
{
     
     public function diffFormatCarbonDatetime($start_datetime, $end_datetime)
     {
          if (empty($start_datetime) || empty($end_datetime)) {
               return null;
          }
          $start_carbon = Carbon::parse($start_datetime);
          $end_carbon = Carbon::parse($end_datetime);
          if ($start_carbon->gt($end_carbon)) {
               return null;
          }

          $diff_days = $start_carbon->diffInDays($end_carbon);
          $diff_hours   = $start_carbon->diffInHours($end_carbon);
          $diff_minutes = $start_carbon->diffInMinutes($end_carbon);
          // 日付差分を自然な日本語にする(0の日時分は非表示とする)
          $result_string = '';
          $string_kan_flg = false; // 最後に"間"をつけるか否か
          if ($diff_days > 0) {
               $result_string .= $diff_days . '日';
          }
          if ($diff_hours > 0) {
               $diff_hours = ($diff_hours < 24) ? $diff_hours : $diff_hours % 24; // 100hなら4日間分の96hを切り落とし4hとする
               if ($diff_hours > 0) {
                    $string_kan_flg = true;
                    $result_string .= $diff_hours . '時間';
               }
          }
          $diff_minutes = ($diff_minutes < 60) ? $diff_minutes : $diff_minutes % 60; // 100分なら1時間分の60を切り落とし40分とする
          if ($diff_minutes > 0 || ($diff_days === 0 && $diff_hours === 0)) { // 0分のときは、0日0時間の場合のみ0分を表示する
               $result_string .= $diff_minutes . '分';
          }
          // どこにも"間"が無いなら最後につける
          $result_string = ($string_kan_flg) ? $result_string : $result_string . '間';
          return $result_string;
     }
}
