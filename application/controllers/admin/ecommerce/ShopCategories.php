<?php

/*
 * @Author:    Kiril Kirkov
 *  Gitgub:    https://github.com/kirilkirkov
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

include_once(APPPATH.'core/ADMIN_Controller.php');

class ShopCategories extends CI_Controller
{

    private $num_rows = 20;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Admin/ShopCategories_model'));
        $this->admin_login->cek_login();
    }

    public function index($page = 0)
    {
        // $this->login_check();

        $head = array();
        $head['title'] = 'Administration - Home Categories';
        $head['description'] = '!';
        $head['keywords'] = '';
        $data['product_categories'] = $this->ShopCategories_model->getShopCategories($this->num_rows, $page);

        // $data['languages'] = $this->Languages_model->getLanguages();
        $rowscount = $this->ShopCategories_model->categoriesCount();
        $data['links_pagination'] = pagination('admin/product-categories', $rowscount, $this->num_rows, 3);
        if (isset($_GET['delete'])) {
            // $this->saveHistory('Delete a shop categorie');
            $this->ShopCategories_model->deleteShopCategorie($_GET['delete']);
            $this->session->set_flashdata('result_delete', 'Shop Categorie is deleted!');
            redirect('admin/product-categories');
        }
        if (isset($_POST['submit'])) {
            $this->ShopCategories_model->setShopCategorie($_POST);
            $this->session->set_flashdata('result_add', 'Shop categorie is added!');
            redirect('admin/product-categories');
        }
        if (isset($_POST['editSubId'])) {
            $result = $this->ShopCategories_model->editShopCategorieSub($_POST);
            if ($result === true) {
                $this->session->set_flashdata('result_add', 'Subcategory changed!');
                // $this->saveHistory('Change subcategory for category id - ' . $_POST['editSubId']);
            } else {
                $this->session->set_flashdata('result_add', 'Problem with Shop category change!');
            }
            redirect('admin/product-categories');
        }
        // $this->load->view('_parts/header', $head);
        // $this->load->view('ecommerce/shopcategories', $data);
        // $this->load->view('_parts/footer');
        // $this->saveHistory('Go to shop categories');

        /* Render Page */
        $site = $this->mConfig->list_config();
        $data['title'] = 'Admin - Product Categories';
        $data['site'] = $site;
        $data['isi'] = 'admin/ecommerce/shopcategories';
        
        $this->load->view('admin/layout/wrapper',$data);


    }

    /*
     * Called from ajax
     */

    public function editShopCategorie()
    {
        // $this->login_check();
        $result = $this->ShopCategories_model->editShopCategorie($_POST);
        // $this->saveHistory('Edit shop categorie to ' . $_POST['name']);
    }

    /*
     * Called from ajax
     */

    public function changePosition()
    {
        $result = $this->ShopCategories_model->editShopCategoriePosition($_POST);
        // $this->saveHistory('Edit shop categorie position ' . $_POST['name']);
    }


    public function CategorySpesification($page = 0){

        $filter = array(
            'cat' => $_GET['cat'], 
            'type' => $_GET['type']
        );

        $head = array();
        $head['title'] = 'Administration - Home Categories';
        $head['description'] = '!';
        $head['keywords'] = '';
        $data['category_specification'] = $this->ShopCategories_model->getSpesification($this->num_rows, $page, $filter);
        $data['product_categories'] =  $this->db->get('product_categories')->result();

        // $data['languages'] = $this->Languages_model->getLanguages();
        $rowscount = $this->ShopCategories_model->spesificationCount($filter);

        $data['links_pagination'] = pagination('admin/category-spesification', $rowscount, $this->num_rows, 3);

        if (isset($_GET['delete'])) {
            // $this->saveHistory('Delete a shop categorie');
            $this->ShopCategories_model->deleteSpesificationCategorie($_GET['delete']);
            $this->session->set_flashdata('result_delete', 'cat spec is deleted!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        if (isset($_POST['submit'])) {
            $this->ShopCategories_model->addSpesificationCategorie();
            $this->session->set_flashdata('result_add', 'cat spec is added!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        if (isset($_POST['editSubId'])) {
            $result = $this->ShopCategories_model->editShopCategorieSub($_POST);
            if ($result === true) {
                $this->session->set_flashdata('result_add', 'Subcategory changed!');
                // $this->saveHistory('Change subcategory for category id - ' . $_POST['editSubId']);
            } else {
                $this->session->set_flashdata('result_add', 'Problem with Shop category change!');
            }
            redirect('admin/product-categories');
        }
        // $this->load->view('_parts/header', $head);
        // $this->load->view('ecommerce/shopcategories', $data);
        // $this->load->view('_parts/footer');
        // $this->saveHistory('Go to shop categories');

        /* Render Page */
        $site = $this->mConfig->list_config();
        $data['title'] = 'Admin - Product Categories Spesification';
        $data['site'] = $site;
        $data['isi'] = 'admin/ecommerce/category-spesification-list';
        
        $this->load->view('admin/layout/wrapper',$data);
    }

}
