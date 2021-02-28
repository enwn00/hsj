<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Code_model');
    }



	public function index()
	{
		
		// http://127.0.0.1/index.php/algorithm
		debugPrint("Algorithm_index");


		// eval("
		// 		\$aNumbers = range(1, 100); // 1~100개의 숫자가 들어있는 배열 생성
		// 		\$outArray = array_rand(\$aNumbers, 10); // 랜덤으로 10개 추출
		// 		shuffle(\$outArray); // 배열 섞기

		// 		foreach (\$outArray as \$key => \$value) {
		// 			echo(\$value);
		// 			echo('<br>');
		// 		}
		// 	");


		// eval("
		// 		shuffle(\$outArray); // 배열 섞기

		// 		foreach (\$outArray as \$key => \$value) {
		// 			echo(\$value);
		// 			echo('<br>');
		// 		}
		// 	");
		// print("test");
		// exit;

		//$this->load->view('code_list');

		// $this->load->database();
		// //$query = $this->db->query('SELECT * FROM cc_coupon');
		
		// $id = 1;
		// $limit = 10;
		// $offset = 1;
		// $query = $this->db->get_where('cc_coupon', array('benefit_type' => $id), $limit, $offset);
		// $str = $this->db->last_query();
		// debugPrint($str);
		// debugPrint($query->result_array());


		$aStructure = array(
            'container' => 'code/code_index',
            'data' => array(
                
            ),
        );
        $this->load->view('layout/layout', $aStructure);
	}

	public function list(){
 		$this->load->model('Paging_model');

// 		if (!empty($page)){
// 			$page = 1;
// 		}

// 		//페이지네이션 라이브러리 로딩
// 		$this->load->library('pagination');

// 	    //페이지네이션 설정 세그먼트
// 	    $config['base_url'] = base_url()."code/list/"; //페이징 주소
// 	    $config['total_rows'] = $this->Paging_model->total_cnt('blog'); //게시물 전체 수
// 	    $config['per_page'] = 5;  //한번에 보여줄 레코드 
// 	    debugPrint($config);
// 	    $this->pagination->initialize($config);

// 	    $aData=array();  //배열생성 후 담아서 보냄
// 	    $aData['pagination'] = $this->pagination->create_links();
// debugPrint($aData);
// 	    //실패시에 1을 리턴

// 	    $page = $this->uri->segment(4,1);
// 	    if($page > 1){
// 	      $start = (($page/$config['per_page'])) * $config['per_page'];
// 	    }else{
// 	      $start = ($page -1) * $config['per_page'];
// 	    }

// 	    $limit = $config['per_page'];
// 	    $aData['data'] = $this->Paging_model->getList($start, $limit);
// debugPrint($aData);


		//페이지네이션 라이브러리 로딩
		$this->load->library('pagination');

	    //페이지네이션 설정 세그먼트
	    $config['base_url'] = base_url()."code/list/"; //페이징 주소
	    $config['total_rows'] = $this->Paging_model->total_cnt('code'); //게시물 전체 수
	    $config['per_page'] = 5;  //한번에 보여줄 레코드 

	    $this->pagination->initialize($config);

	    $page = $this->uri->segment(4,1);

	    if($page > 1){
	      $start = (($page/$config['per_page'])) * $config['per_page'];
	    }else{
	      $start = ($page -1) * $config['per_page'];
	    }
		
		$limit = $config['per_page'];
		
		$aData['data'] = $this->Paging_model->getList($start, $limit);
		$aStructure = array(
            'container' => 'code/code_list',
            'data' => array(
                'list' => $aData['data']
            ),
    //         'link' => array(
				// 'active' => false,
				// 'uri'    => 'code/list/'.$page,
				// 'title'  => 1
    //         ),
        );
        $this->load->view('layout/layout', $aStructure);
	}

	public function set($code_id = 0){
		
		$aResult = array();

		if ((int)$code_id > 0){
			$code_id = (int)$code_id;
			$aResult = $this->Code_model->get((int)$code_id);
		}

		$aStructure = array(
            'container' => 'code/code_set',
            'data' => array(
                'info' => $aResult
            ),
        );
        $this->load->view('layout/layout', $aStructure);
	}

	public function info($iId){
		if (empty($iId) || !is_numeric($iId)){
			echo "숫자만 입해주세요.";
			exit;
		}

		$aResult = $this->Code_model->get((int)$iId);

		$aStructure = array(
            'container' => 'code/code_info',
            'data' => array(
                'info' => $aResult
            ),
        );
        $this->load->view('layout/layout', $aStructure);
	}
}
