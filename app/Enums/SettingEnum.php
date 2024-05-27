<?php
namespace App\Enums;

enum SettingEnum: string
{
    case STUDY_STARTING_TIME_SETTING = "study_starting_time_setting";
    case ATTENDANCE_OPENING_HOURS_SETTING = "attendance_opening_hour_setting";
    case LATE_ATTENDANCE_DURATION_SETTING = "late_attendance_duration_setting";
    case ATTENDANCE_RADIUS_SETTING = "attendance_radius_setting";
}
