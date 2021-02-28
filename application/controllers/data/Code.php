code<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

        set_time_limit(5);
    }

	private function get_time() { $t=explode(' ',microtime()); return (float)$t[0]+(float)$t[1]; }


/*
$aNumbers = range(1, 100); // 1~100개의 숫자가 들어있는 배열 생성
$outArray = array_rand($aNumbers, 10); // 랜덤으로 10개 추출
shuffle($outArray); // 배열 섞기

foreach ($outArray as $key => $value) {
	echo($value);
	echo('<br>');
}
*/
	public function run(){		
		$start = self::get_time();

		echo "</br>";
		$sCodeTextarea = $this->input->post('textarea');
		eval($sCodeTextarea);

		$end = self::get_time();
		$time = $end - $start;

		echo "</br>";
		echo number_format($time,6) . " 초 걸림";

		exit;
	}

	public function set(){
		$this->load->model('Code_model');

		$aData = array(
	        'code_title' => $this->input->post('title'),
	        'source_code' => $this->input->post('textarea')
	    );

		$bResult = $this->Code_model->set($aData);
		if ($bResult != TRUE){
			echo "저장실패";
			exit;
		}

		echo "<script>location.replace('/code/list')</script>";
		exit;
	}	

	public function put(){
		$this->load->model('Code_model');

		if (empty($this->input->post('id'))) {
			echo "필수 값 누락"; 
			exit;
		}

		$aData = array(
	        'code_id' => $this->input->post('id'),
	        'code_title' => $this->input->post('title'),
	        'source_code' => $this->input->post('textarea')
	    );

		$bResult = $this->Code_model->put($aData);
		if ($bResult != TRUE){
			echo "수정실패";
			exit;
		}

		echo "<script>location.replace('/code/set/{$this->input->post('id')}')</script>";
		exit;
	}
}
