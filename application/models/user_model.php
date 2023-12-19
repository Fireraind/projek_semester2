<?php
class user_model extends CI_Model
{
    public  function getalldatauser()
    {
        $query = "SELECT * FROM `user` WHERE role_id ='2';";

        return $this->db->query($query)->result_array();
    }
    // public function countuser()
    // {
    //     return $this->db->get('user')->num_rows();
    // }
}
