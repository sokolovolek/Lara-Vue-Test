<?php
namespace App\Http\Traits;
trait SmsTrait {
    private $SMS_APIKEY='DtQVOpaC2BhRYnoCijrpiQdNsCk0Mr0ISuGzoFcy71rk4w1dr5';
    private $SMS_USERNAME='akademico';
    private $SMS_SENDER='GENIUS';
    private $SMS_DLR='1';
    private $SMS_MSGTYPE='5';


    protected function sendsms($phonenumber,$message){
    // protected function sendsms(Request $data){
    //             // $message =$data->message;
    //             // $phonenumber = $data->phone_number;

                $postData = array(
                    'username' => $this->SMS_USERNAME,
                    'api_key' => $this->SMS_APIKEY,
                    'sender' => $this->SMS_SENDER,
                    'to' => $phonenumber,
                    'message' => $message,
                    'msgtype' => $this->SMS_MSGTYPE,
                    'dlr' => $this->SMS_DLR,
                );
                // $url = 'www.your-domain.com/api.php?to='.$mobile.'&text='.$message;
                // $url = 'https://sms.movesms.co.ke/api/compose?username='.$this->SMS_USERNAME.'&api_key='.$this->SMS_APIKEY.'&sender='.$this->SMS_SENDER.'&to='.$phonenumber.'&message='.$message.'&msgtype='.$this->SMS_MSGTYPE.'&dlr='.$this->SMS_DLR;
              
                $url = 'https://sms.movesms.co.ke/api/compose?';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
              
                $response = curl_exec ($ch);
                $err = curl_error($ch);  //if you need
                curl_close ($ch);
                // return $response;

                // if($err){
                //     return back()->with('error-message',$err);
                // }

                // return back()->with('success-message',$response);
    }
}