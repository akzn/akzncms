<?php
	/*
    
    @Class Name : Produk(Front)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	private $num_rows = 16;
	function __construct(){
		parent::__construct();
		$this->load->model('shop_model');
	}
	
	// Main Page Produk
	/*public function index() {

		$site  		= $this->mConfig->list_config();
		$blogs 		= $this->mBlogs->listBlogsPub();

		

		// Pagination
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'produk/index/';
		// $config['total_rows'] 		= count($this->mProducts->totalProducts());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 10;
		$config['first_url'] 		= base_url().'produk/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		// $products 	= $this->mProducts->perPageProducts($config['per_page'], $page);
		// End Pagination	

		// $mainCatList = $this->shop_model->getMainCategoryList(); 		
			
		$nav_categories = $this->getCategoryList();

		$data = array(	'title'		=> 'Produk - '.$site['nameweb'],
						'site'		=> $site,
						// 'products'	=> $products,
						'nav_categories' => $nav_categories,
						'blogs'		=> $blogs,
						'pagin' 	=> $this->pagination->create_links(),																		
						'isi'		=> 'front2/shop/list');
		$this->load->view('front2/layout/wrapper-shop',$data);
	}*/

	function _remap($method, $params=array())
    {
        $methodToCall = method_exists($this, $method) ? $method : 'index';
        return call_user_func_array(array($this, $methodToCall), $params);
    }

    public function index($page = 0){
    	$page = $this->uri->segment(2);
    	if (!$page) {
    		$page = 0;
    	}
    	$site  		= $this->mConfig->list_config();
        $data = array();
        // $head = array();
        // $arrSeo = $this->Public_model->getSeo('shop');
        // $head['title'] = @$arrSeo['title'];
        // $head['description'] = @$arrSeo['description'];
        // $head['keywords'] = str_replace(" ", ",", $head['title']);
        // $all_categories = $this->Public_model->getShopCategories();
        // $data['home_categories'] = $this->getHomeCategories($all_categories);
        // $data['all_categories'] = $all_categories;
        // $data['showBrands'] = $this->Home_admin_model->getValueStore('showBrands');
        // $data['brands'] = $this->Brands_model->getBrands();
        // $data['showOutOfStock'] = $this->Home_admin_model->getValueStore('outOfStock');
        // $data['shippingOrder'] = $this->Home_admin_model->getValueStore('shippingOrder');

        $data['products'] = $this->shop_model->getProducts($this->num_rows, $page, $_GET);
        $rowscount = $this->shop_model->productsCount($_GET);
        $data['category_data'] = $this->shop_model->getCategoryData($_GET);
        $data['rowscount'] = $rowscount;
        $data['links_pagination'] = pagination('shop', $rowscount, $this->num_rows);
        $nav_categories = $this->getCategoryList();

        /*render view*/
        $data['title'] = 'Produk - '.$site['nameweb'];
		$data['site'] = $site;
						// 'products'	=> $products,
		$data['nav_categories'] = $nav_categories;
		$data['blogs']		= $blogs;
		// $data['pagin'] 	= $this->pagination->create_links();																		
		$data['isi']	= 'front2/shop/list';

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