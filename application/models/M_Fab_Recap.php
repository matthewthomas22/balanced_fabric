<?php 
    class M_Fab_Recap extends CI_Model{
        public function getQTYforCut(){
            $sql = "SELECT 
                        * 
                    FROM 
                        prominent.v_rekap_qty 
                    WHERE 
                        original_ex_date > '2022-12-31'
                    ORDER BY 
                        po_buyer DESC";

            $result = $this->db->query($sql)->result_array();

            return $result;
        }
    }