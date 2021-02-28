
<?php
class Code_model extends CI_Model{
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	//게시물 전체 레코드
	public function set($aData){
		try {
			$this->db->insert('code', $aData);

			return TRUE;
		} catch (Exception $e) {
			return FALSE;
		}
	}

	public function get($iId){
		try {
			$query = $this->db->get_where('code', array('code_id' => $iId))->row_array();

			return $query;
		} catch (Exception $e) {
			return array();
		}
	}

	public function put($aData){
		try {
			$this->db->where('code_id', $aData['code_id']);
			unset($aData['code_id']);
			$this->db->update('code', $aData);

			return TRUE;
		} catch (Exception $e) {
			return FALSE;
		}

	}
}