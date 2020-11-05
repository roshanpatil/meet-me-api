<?php
class Operation_model extends CI_Model {
    function get_data($table) {
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->row_array();
    }

    function insert_data($data,$table_name) {
        $result["resp"] = $this->db->insert($table_name, $data);
        if($result["resp"]){
            return $this->db->insert_id();
        }else{
            return $result;
        }
    }

    function get_data_by_cols($table,$cols,$cond,$limit = "",$offset = "") {
        $this->db->select($cols);
        $this->db->from($table);
        $this->db->where($cond);
        if($limit != ""){
            $this->db->limit($limit,$offset);
        }
        //$this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array(); 
    }

    function update_data_by_id($id,$data,$table){
        $this->db->where('id', $id);
        $myop = $this->db->update($table, $data);
        //echo $this->db->last_query();
        return $this->db->affected_rows();
    }

    function delete_user_by_cond($table,$cond) {
        $this->db->where($cond);
        $this->db->delete($table);
    }

    function update_data_by_cols($data,$table,$cols){
        $this->db->where($cols);
        $myop = $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
}