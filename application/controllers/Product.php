<?php
	/*
    
    @Class Name : Produk(Front)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('products_model');
		$this->load->model('shop_model');
	}
	
	// Main Page Produk
	public function index() {

		redirect('shop');
	}

    // Ajax modal detail produk
    public function product_data($id=null){
        // $id='8';
        $fetch_data = $this->products_model->getOneProduct($id);
        $site      = $this->mConfig->list_config();

        $data['site'] = $site;

        if ($fetch_data === null) {
            $this->output->set_status_header(404);
        } else {

            $data['product']['title'] = $fetch_data['title'];
            $data['product']['categorie_name'] = $fetch_data['categorie_name'];
            $data['product']['image'] = $fetch_data['image'];
            $data['product']['description'] = $fetch_data['description'];

            # get spec
            $id_categories = $fetch_data['shop_categorie'];
            $this->db->select('spec_name, specification_id');
            $this->db->where('product_categories_id', $id_categories);
            $this->db->where('sub_for', '0');
            $this->db->where('spec_type', '0');
            $spec_kat_result = $this->db->get('product_category_specification')->result();
            $spec_data = $spec_kat_result;

            // insert sub spec to $spec_data
            foreach ($spec_data as $key) {
                $this->db->select('title,value, unit');
                $this->db->where('products.id',$id);
                $this->db->join('product_specification','product_specification.product_id = products.id');
                $this->db->join('product_category_specification','product_category_specification.specification_id = product_specification.product_category_specification_id');
                $this->db->where('sub_for', $key->specification_id);
                $get_sub = $this->db->get('products')->result();
                $key->sub = $get_sub;
                // var_dump($get_sub);
            }

            if ($spec_data) {
                $data['specification'] = $spec_data;
                // $data['table_specification'] = $this->load->view('front2/shop/spec-div',$data);
                // $data['table_specification'] = utf8_encode("<h1>asdasd</h1>");
            }

            // echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            $this->load->view('front2/shop/spec-div',$data);
            // var_dump($data['table_specification']);
            // $this->load->view('front2/shop/spec-div',$data);
        }
        
    }

	// Detil Produk
	public function viewProduct($id) {

		$data = array();
        $head = array();
        $site  		= $this->mConfig->list_config();
        $data['product'] = $this->products_model->getOneProduct($id);
        $data['sameCagegoryProducts'] = $this->products_model->sameCagegoryProducts($data['product']['shop_categorie'], $id);
        
        if ($data['product'] === null) {
            redirect('shop');
        }
        // $vars['publicDateAdded'] = $this->Home_admin_model->getValueStore('publicDateAdded');
        // $this->load->vars($vars);

        # get spec
        $id_categories = $data['product']['shop_categorie'];
        $this->db->select('spec_name, specification_id');
        $this->db->where('product_categories_id', $id_categories);
        $this->db->where('sub_for', '0');
        $this->db->where('spec_type', '0');
        $spec_kat_result = $this->db->get('product_category_specification')->result();
        $spec_data = $spec_kat_result;

        // insert sub spec to $spec_data
        foreach ($spec_data as $key) {
            $this->db->select('title,value, unit');
            $this->db->where('products.id',$id);
            $this->db->join('product_specification','product_specification.product_id = products.id');
            $this->db->join('product_category_specification','product_category_specification.specification_id = product_specification.product_category_specification_id');
            $this->db->where('sub_for', $key->specification_id);
            $get_sub = $this->db->get('products')->result();
            $key->sub = $get_sub;
            // var_dump($get_sub);
        }

        # get suitable excavator for breaker (unique custom just for breaker?)
        $id_categories = $data['product']['shop_categorie'];
        $this->db->select('spec_name, specification_id, title, value');
        $this->db->join('product_specification','product_specification.product_category_specification_id = product_category_specification.specification_id');
        $this->db->join('products','product_specification.product_id = products.id');
        $this->db->where('spec_type', 'excavator'); // custom for breaker yukimura
        $this->db->where('product_categories_id', $id_categories);
        $this->db->where('products.id',$id);
        $excav_result = $this->db->get('product_category_specification')->result();
        $spec2_data = $excav_result; 

        # get product type (jenis jenis item/tipe dalam satu produk)
        $id_categories = $data['product']['shop_categorie'];
        $this->db->select('spec_name, specification_id, title, value');
        $this->db->join('product_specification','product_specification.product_category_specification_id = product_category_specification.specification_id');
        $this->db->join('products','product_specification.product_id = products.id');
        $this->db->where('spec_type', 'product-type'); // custom for spareparts
        $this->db->where('product_categories_id', $id_categories);
        $this->db->where('products.id',$id);
        $result = $this->db->get('product_category_specification')->row();
        $spec_product_type = $result; 

        $data['specification'] = $spec_data;
        $data['specification_2'] = $spec2_data;
        $data['specification_product_type'] = $spec_product_type;
        
        // $this->render('view_product', $head, $data);

        /*render view*/
        $data['title'] = 'Produk - '.$site['nameweb'];
		$data['site'] = $site;
		
		$data['nav_categories'] =  $this->getCategoryList();
		$data['blogs']		= $blogs;
		$data['pagin'] 	= $this->pagination->create_links();																		
		$data['isi']	= 'front2/product/detail';
        // var_dump($data['product']);exit;
		$this->load->view('front2/layout/wrapper-shop',$data);
	}	

	function getCategoryList(){

		$all_categories = $this->shop_model->getShopCategories();

        function buildTree1(array $elements, $parentId = 0)
        {
            $branch = array();
            foreach ($elements as $element) {
                if ($element['sub_for'] == $parentId) {
                    $children = buildTree1($elements, $element['id']);
                    if ($children) {
                        $element['children'] = $children;
                    }
                    $branch[] = $element;
                }
            }
            return $branch;
        }

        $nav_categories = $tree = buildTree1($all_categories);

        return $nav_categories;
	}
}