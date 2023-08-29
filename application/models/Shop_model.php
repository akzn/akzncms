<?php
	/*
    
    @Class Name : Blogs Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Shop_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }
                
        public function getMainCategoryList(){
            $this->db->where('sub_for',0);
            return $this->db->get('product_categories')->result();
        }      

        public function getShopCategories($active=NULL)
        {
            # get only active category if $active=='active'
            if (isset($active) && $active=='active') {
                $this->db->where('product_categories.active','1');
            }
            $this->db->select('sub_for, id, name, slug');
            $this->db->order_by('position', 'asc');
            // $this->db->join('product_categories', 'product_categories.id = product_categories_translations.for_id', 'INNER');
            $query = $this->db->get('product_categories');
            $arr = array();
            if ($query !== false) {
                foreach ($query->result_array() as $row) {
                    $arr[] = $row;
                }
            }
            return $arr;
        }      

        public function getProducts($limit = null, $start = null, $big_get = null, $vendor_id = false)
        {   
            if ($limit !== null && $start !== null) {
                $this->db->limit($limit, $start);
            }
            if (!empty($big_get) && isset($big_get['category'])) {
                $this->getFilter($big_get);
            }
            $this->db->select('id,image, quantity, title, price, old_price, url');
            $this->db->where('visibility', 1);
            // if ($vendor_id !== false) {
            //     $this->db->where('vendor_id', $vendor_id);
            // }
            // if ($this->showOutOfStock == 0) {
            //     $this->db->where('quantity >', 0);
            // }
            // if ($this->showInSliderProducts == 0) {
            //     $this->db->where('in_slider', 0);
            // }
            // if ($this->multiVendor == 0) {
            //     $this->db->where('vendor_id', 0);
            // }
            $this->db->order_by('id', 'desc');
            $query = $this->db->get('products');

            // echo $this->db->last_query();exit;
            return $query->result_array();
        }   

        public function productsCount($big_get)
        {
            if (!empty($big_get) && isset($big_get['category'])) {
                $this->getFilter($big_get);
            }
            $this->db->where('visibility', 1);
            // if ($this->showOutOfStock == 0) {
            //     $this->db->where('quantity >', 0);
            // }
            // if ($this->showInSliderProducts == 0) {
            //     $this->db->where('in_slider', 0);
            // }
            // if ($this->multiVendor == 0) {
            //     $this->db->where('vendor_id', 0);
            // }
            return $this->db->count_all_results('products');
        }         
        private function getFilter($big_get)
        {

            if ($big_get['category'] != '') {
                (int) $big_get['category'];
                $findInIds = array();
                $findInIds[] = $big_get['category'];
                $query = $this->db->query('SELECT id FROM product_categories WHERE sub_for = ' . $this->db->escape($big_get['category']));
                foreach ($query->result() as $row) {
                    $findInIds[] = $row->id;
                }
                $this->db->where_in('products.shop_categorie', $findInIds);
            }
            if (@$big_get['in_stock'] != '') {
                if ($big_get['in_stock'] == 1)
                    $sign = '>';
                else
                    $sign = '=';
                $this->db->where('products.quantity ' . $sign, '0');
            }
            if (@$big_get['search_in_title'] != '') {
                $this->db->like('title', $big_get['search_in_title']);
            }
            if (@$big_get['search_in_body'] != '') {
                $this->db->like('description', $big_get['search_in_body']);
            }
            if (@$big_get['order_price'] != '') {
                $this->db->order_by('price', $big_get['order_price']);
            }
            if (@$big_get['order_procurement'] != '') {
                $this->db->order_by('products.procurement', $big_get['order_procurement']);
            }
            if (@$big_get['order_new'] != '') {
                $this->db->order_by('products.id', $big_get['order_new']);
            } else {
                $this->db->order_by('products.id', 'DESC');
            }
            if (@$big_get['quantity_more'] != '') {
                $this->db->where('products.quantity > ', $big_get['quantity_more']);
            }
            if (@$big_get['quantity_more'] != '') {
                $this->db->where('products.quantity > ', $big_get['quantity_more']);
            }
            if (@$big_get['brand_id'] != '') {
                $this->db->where('products.brand_id = ', $big_get['brand_id']);
            }
            if (@$big_get['added_after'] != '') {
                $time = strtotime($big_get['added_after']);
                $this->db->where('products.time > ', $time);
            }
            if (@$big_get['added_before'] != '') {
                $time = strtotime($big_get['added_before']);
                $this->db->where('products.time < ', $time);
            }
            if (@$big_get['price_from'] != '') {
                $this->db->where('price >= ', $big_get['price_from']);
            }
            if (@$big_get['price_to'] != '') {
                $this->db->where('price <= ', $big_get['price_to']);
            }
        }                  

        public function getCategoryData($big_get){
            if ($big_get) {
                $id = $big_get['category'];
                $this->db->where('id',$id);
                $name = $this->db->get('product_categories')->row();
                return $name;
            } else return false;
            
        }           

        public function getCategoryBySlug($slug){
            $this->db->where('slug',$slug);
            $data = $this->db->get('product_categories')->row();

            return $data;
        }              

    }
