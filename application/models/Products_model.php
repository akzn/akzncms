<?php
	/*
    
    @Class Name : Products Model
    * Customized for AKZN version of company web with shop
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Products_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }


        public function getProducts(){

            $query = "SELECT id,title,image,url FROM products WHERE id IN 
                        (SELECT id FROM (SELECT id FROM products ORDER BY RAND() LIMIT 9) t)";
            return $this->db->query($query)->result();
        }


        public function getOneProduct($id)
        {
            $this->db->where('products.id', $id);

            $this->db->select('products.*, title,description, price, old_price, down_payment, products.url, product_categories.name as categorie_name, product_categories.slug as categorie_slug');

            $this->db->join('product_categories', 'product_categories.id = products.shop_categorie', 'inner');
            $this->db->where('visibility', 1);
            $query = $this->db->get('products');

            // var_dump($this->db->last_query());exit;
            return $query->row_array();
        }

        public function sameCategoryProducts($categorie, $noId, $vendor_id = false)
        {
            $this->db->select('products.id, products.quantity, products.image, products.url, price, title, old_price');
            $this->db->where('products.id !=', $noId);
            if ($vendor_id !== false) {
                $this->db->where('vendor_id', $vendor_id);
            }
            $this->db->where('products.shop_categorie =', $categorie);
            $this->db->where('visibility', 1);
            if ($this->showOutOfStock == 0) {
                $this->db->where('quantity >', 0);
            }
            $this->db->order_by('products.id', 'desc');
            $this->db->limit(5);
            $query = $this->db->get('products');
            return $query->result_array();
        }
        

    }
