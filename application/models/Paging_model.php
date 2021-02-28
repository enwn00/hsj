<?php
class Paging_model extends CI_Model{

	

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	//게시물 전체 레코드 수
	function total_cnt ($sTabelNm){
		try {
			return (int)$this->db->count_all($sTabelNm);
		} catch (Exception $e) {
			return 0;
		}
		
	}

	//레코드 목록
	function getList($offset='',$limit=''){

		try {
			$limit_query = '';
			if($limit != '' || $offset != ''){
				$limit_query = ' limit '.$offset.', '.$limit;
			}
			$sql = "select * from code order by code_id desc ".$limit_query;
			return $this->db->query($sql)->result_array();
		} catch (Exception $e) {
			return array();
		}
		
	}
}