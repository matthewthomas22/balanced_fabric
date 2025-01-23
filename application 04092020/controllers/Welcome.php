	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_zroh');
	}

	// public function index()
	// {
	// $data['zroh'] = $this->m_zroh->get_data();
	// $data['zroh2'] = 'testing';
	// $this->load->view('login',$data);

	// }

	function index(){
		$this->load->view('v_login');
	}

	function cek_login()	{
			$this->load->view('home');
	}

	function zroh_data(){
		$data=$this->m_zroh->zroh_list();
		echo json_encode($data);
	}

	function save(){
		$data=$this->m_zroh->save_zroh();
		echo json_encode($data);
	}

	function update(){
		$data=$this->m_zroh->update_zroh();
		echo json_encode($data);
	}

	function delete(){
		$data=$this->m_zroh->delete_zroh();
		echo json_encode($data);
	}
}

?>
