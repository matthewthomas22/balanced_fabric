<?php 
    class C_Fab_Recap extends CI_Controller{
        public function __construct(){
            parent::__construct();
            //validasi jika user belum login
            //validasi jika user belum login
            if($this->session->userdata('login_success') != TRUE){
                    $url=base_url();
                    redirect($url);
                }else{
              $this->load->model('M_Fab_Recap');
            }
        
        }

        public function index(){
            // $data['qty_toCut'] = $this->M_Fab_Recap->getQTYforCut();
            $this->load->view('v_fab_recap');
        }

        public function getQTYforCut(){                         //Ambil data pake ajax and VUE di file Javascript
            $result = $this->M_Fab_Recap->getQTYforCut();

            if($result){
                echo json_encode($result);
            }else{
                echo "false";
            }
        }
    }