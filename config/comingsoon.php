<?php

return [
    'snw_enable_email_form' => env('OFFLINE_SHOW_EMAIL_FORM', false),
    'snw_send_email_to' => env('OFFLINE_SEND_EMAIL_TO','info@softnweb.in'),
    'snw_test_mode' => env('OFFLINE_ENABLE', true),
    'snw_year'=> env('OFFLINE_YEAR', '2020'),
    'snw_month'=> env('OFFLINE_MONTH', '5'),
    'snw_day' => env('OFFLINE_DAY' , '15'),
    'snw_hours' => env('OFFLINE_HOURS', '1'),
    'snw_minutes' => env('OFFLINE_MINUTES','1'),
    'snw_seconds' => env ('OFFLINE_SECONDS','0'),

    'snw_facebook' => env ('OFFLINE_FACEBOOK','https://www.facebook.com/mshakalco'),
    'snw_twitter' => env ('OFFLINE_TWITTER','https://twitter.com/mshakalco'),
    'snw_instagram' => env ('OFFLINE_INSTAGRAM','https://www.instagram.com/mshakalco'),
];