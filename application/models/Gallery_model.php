<?php

class Gallery_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getGalleries($num_rows=0,$position=null){
    	$db = $this->db;
    	if ($num_rows>0) {
    		$db->limit($num_rows);
    	} else {
            $db->limit(9);
        }

        if ($position!=null) {
            $this->db->where('position',$position);
        }

    	$db->order_by('gallery_id','desc');

        return $db->get('galleries')->result();
    }
}