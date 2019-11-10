<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function send()
    {
        //foreground
        $data = array([
            'title' => 'eyad',
            'message' => 'mmmmmm',
            'image' => 'null'
        ]);

        // background
        $fields = array(
            'to' => 'fioYS7Zuclw:APA91bGxirbML65WBUAX8PufGqkwKfGmkMT58lYV_q6L9IDd8YtqVo1Oh_wkR-jKwt6gYRcqCDDA2OArvDzv2Qg_tTVDsFHhzPN-T_kg1WfFCY_v_YlhfMQB5FqtaIY3fh9nvgsMlOvS',
            'notification' => ["body" => "Cool offers. Get them before expiring!",
                "title" => "Flat 80% discount",
                "icon" => "logo",
                "sound" => "default"
            ],
            'data' => response()->json($data[0]),
        );
        // Send to all devices
        /*$fields = array(
            'registration_ids' => array('fioYS7Zuclw:APA91bGxirbML65WBUAX8PufGqkwKfGmkMT58lYV_q6L9IDd8YtqVo1Oh_wkR-jKwt6gYRcqCDDA2OArvDzv2Qg_tTVDsFHhzPN-T_kg1WfFCY_v_YlhfMQB5FqtaIY3fh9nvgsMlOvS',
                'fioYS7Zuclw:APA91bGxirbML65WBUAX8PufGqkwKfGmkMT58lYV_q6L9IDd8YtqVo1Oh_wkR-jKwt6gYRcqCDDA2OArvDzv2Qg_tTVDsFHhzPN-T_kg1WfFCY_v_YlhfMQB5FqtaIY3fh9nvgsMlOvS',),
            'notification' => ["body" => "Cool offers. Get them before expiring!",
                "title" => "Flat 80% discount",
                "icon" => "logo",
                "sound" => "default"
            ],
            'data' => response()->json($data[0]),
        );*/
        return $this->sendPushNotification($fields);
    }

    // function makes curl request to firebase servers
    private function sendPushNotification($fields)
    {


        //firebase server url to send the curl request
        $url = 'https://fcm.googleapis.com/fcm/send';

        //building headers for the request
        $headers = array(
            'Authorization: key=AAAAKveT9F8:APA91bHQZcrqIKApiz29ZLH80Bzf1Q3IRzxJwDj5K36Kwv7442S00ULWvbeSpoJvMiBRv7doBiqumLkWS_g1QGVG3666v9PsJIQYHcdSTs1BiI5m9l_iDGQtMb9SpsPHuxD0DvJakxKD',
            'Content-Type: application/json'
        );

        //Initializing curl to open a connection
        $ch = curl_init();

        //Setting the curl url
        curl_setopt($ch, CURLOPT_URL, $url);

        //setting the method as post
        curl_setopt($ch, CURLOPT_POST, true);

        //adding headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //disabling ssl support
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //adding the fields in json format
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        //finally executing the curl request
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        //Now close the connection
        curl_close($ch);

        //and return the result
        return $result;

    }

    public function sendAcceptNotification()
    {
        /**
         * @param $providerId, $userId || $id of reservation table and then we can get the provider and user from the reservation row.
         *
         * $userToken = User::where('id', $userId)->pluck('device_token')[0];
         * $providerName = User::where('id', $providerId)->pluck('name')[0];
         * $notification = new Notification;
         * $notification ->toSingleDevice($userToken, 'Congratulations!', $providerName . ' has accept your reserve', null, null);
         */
    }

    public function sendDeclineNotification()
    {
        /**
         * @param $providerId, $userId || $id of reservation and then we can get the provider and user from the reservation row.
         *
         * $userToken = User::where('id', $userId)->pluck('device_token')[0];
         * $providerName = User::where('id', $providerId)->pluck('name')[0];
         * $notification = new Notification;
         * $notification ->toSingleDevice($userToken, 'We Apologize!', $providerName . ' has declined your reserve', null, null);
         */
    }

    public function messageToAllUsers()
    {
        /**
         * $tokens = User::where('device_token', '!=', null)->get(['device_token']);
         *
         * $notification->sendTo($tokens, 'Discount!', 'Make your first reservation free!');
         */
    }
}
