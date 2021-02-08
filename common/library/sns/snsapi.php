<?php
namespace common\library\sns;

class snsapi {

    const API_URL='http://106.14.55.160:9000/HttpSmsMt';

    const API_ACCOUNT='czkj';

    const API_PASSWORD='7b945b22ed0e46789f59dcc0b91587fc';

    public function sendSMS( $mobile, $msg,$subid ='01', $needstatus = 1) {
        $time =date('YmdHis',time());
        $postArr = array (
            'name' => self::API_ACCOUNT,
            'pwd' => md5(self::API_PASSWORD.$time),
            'content' => $msg,
            'phone' => $mobile,
            'subid'=>$subid,
            'mttime'=>$time,
            'rpttype' => $needstatus
        );
	
	    $result = $this->curlPost( self::API_URL , $postArr);
	    $res = json_decode($result,true);
	    if($res['ReqCode'] == '00'){
		    return true;
	    }else{
		    \Yii::getLogger()->log($result,'error','insured info');
		    return false;
	    }
        
    }

    public function queryBalance() {
        $postArr = array (
            'name' => self::API_ACCOUNT,
            'pwd' => self::API_PASSWORD,
            'mttime'=>date('YmdHis',time()),
        );
        $result = $this->curlPost(self::API_URL, $postArr);
        return $result;
    }

	public function execResult($result){
		$result=preg_split("/[,\r\n]/",$result);
		return $result;
	}

	private function curlPost($url,$postFields){
		$postFields = http_build_query($postFields);
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $postFields );
		$result = curl_exec ( $ch );
		curl_close ( $ch );
		return $result;
	}
	
	public function __get($name){
		return $this->$name;
	}
	
	public function __set($name,$value){
		$this->$name=$value;
	}
}
