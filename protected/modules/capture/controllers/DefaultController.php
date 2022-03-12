<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->render('index');
        exit();
        $rand = rand(1000, 9999);
        $url = 'http://192.168.30.134:80/snapshot.cgi?' . $rand;  // remember there needs to be a ? between the URL and the random number. Don't remove the question mark.

        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_USERPWD, "panasonic:camera");
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);

        if (empty($buffer)) {
            print "";
        } elseif ($buffer == "Can not get image.") {
            print "Can not get image.";
        } else {
            header("Content-Type: image/jpeg");
            print $buffer;
        }
    }

    public function actionSaveCaptures() {
        $ip_depan = 'http://192.168.0.50';
        $ch_depan = curl_init($ip_depan);
        curl_setopt($ch_depan, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch_depan, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch_depan, CURLOPT_RETURNTRANSFER, true);
        $data_depan = curl_exec($ch_depan);
        $httpdcode_depan = curl_getinfo($ch_depan, CURLINFO_HTTP_CODE);
        curl_close($ch_depan);
        if($httpdcode_depan != 0){
            $gmb_depan = file_get_contents('http://admin:sampang123@192.168.0.50/Streaming/Channels/2');
            $img_depan = base64_encode($gmb_depan);
        }else{
            $img_depan = '';
        }
        $data['img_belakang'] = $img_depan;
        echo json_encode($data);
    }
}
