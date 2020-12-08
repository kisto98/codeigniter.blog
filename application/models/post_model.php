<?php
class Post_model extends CI_Model{
    public function __construct()
    {
    $this->load->database();    
    }

    public function get_posts($slug=false, $limit=FALSE, $offset=FALSE){
        if($limit){
            $this->db->limit($limit, $offset);
        }
        if($slug==false){
            $query=$this->db->get('posts');
            return $query->result_array();
        }

        $query=$this->db->get_where('posts', array('slug'=>$slug));
        return $query->row_array();
    }
    
    public function create_post($file_name) {
        $slug=url_title($this->input->post('title'));
        if ($file_name==null){
        $data=array(
            'title'=> $this->input->post('title'),
            'body'=> $this->input->post('body'),
            'slug'=> $slug,

            'user_id' => $this->session->userdata('user_id'),
        ); }
        else{
            $data=array(
                'title'=> $this->input->post('title'),
                'body'=> $this->input->post('body'),
                'slug'=> $slug,
                'file_name'=> $file_name,
                'user_id' => $this->session->userdata('user_id'),
            );
        }
        return $this->db->insert('posts', $data);
    }

    public function delete_post($id){
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return true;
    }

    

    public function update_post(){
        
        $slug=url_title($this->input->post('title'));
        $data=array(
            'title'=> $this->input->post('title'),
            'body'=> $this->input->post('body'),
 
            
        );
        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('posts', $data);
    }
}