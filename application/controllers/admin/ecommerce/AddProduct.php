<?php

/*
 * @Author:    Kiril Kirkov
 *  Gitgub:    https://github.com/kirilkirkov
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AddProduct extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->admin_login->cek_login();
        $this->load->model(array(
            'Admin/Products_model',
            
            
            'Admin/ShopCategories_model'
        ));
    }

    public function index($id = 0)
    {

        $is_update = false;
        $trans_load = null;
        if ($id > 0 && $_POST == null) {
            $_POST = $this->Products_model->getOneProduct($id);
            // $trans_load = $this->Products_model->getTranslations($id);
        }

        /*If button save */
        if (isset($_POST['submit'])) {
            if (isset($_GET['to_lang'])) {
                $id = 0;
            }

            /*if is edit*/
             if ($id > 0 ) {
                $productData = $this->Products_model->getOneProduct($id);
            }
            
            /* if there is new image*/
            if ( isset( $_FILES["userfile"] ) && !empty( $_FILES["userfile"]["name"] ) ) {
                $old_image = (isset($productData))? $productData['image']: NULL;
                $_POST['image'] = $this->uploadImage($old_image);
            } else {
                $_POST['image'] = '';
            }

            /*if there is new video*/
            if ( isset( $_FILES["videofile"] ) && !empty( $_FILES["videofile"]["name"] ) ) {
                $_POST['video'] = $this->uploadVideo();
            } else {
                $_POST['video'] = '';
            }
                

            $this->Products_model->setProduct($_POST, $id);
            $this->session->set_flashdata('result_publish', 'Product is published!');
            if ($id == 0) {
                //$this->saveHistory('Success published product');
            } else {
                // $this->saveHistory('Success updated product');
            }
            if (isset($_SESSION['filter']) && $id > 0) {
                $get = '';
                foreach ($_SESSION['filter'] as $key => $value) {
                    $get .= trim($key) . '=' . trim($value) . '&';
                }
                redirect(base_url('admin/products?' . $get));
            } else {
                redirect('admin/products');
            }
        }

        $data = array();
        $head = array();
        $head['title'] = 'Administration - Publish Product';
        $head['description'] = '!';
        $head['keywords'] = '';
        $data['id'] = $id;
        $data['trans_load'] = $trans_load;
        // $data['languages'] = $this->Languages_model->getLanguages();
        $data['product_categories'] = $this->ShopCategories_model->getShopCategoriesActive();

        if ($_GET['cat']) {
            $filter = array('cat' => $_GET['cat']);
            $data['category_specification'] = $this->ShopCategories_model->getSpesificationAll($filter,$id);
        }

        // $data['brands'] = $this->Brands_model->getBrands();
        $data['otherImgs'] = $this->loadOthersImages();


        // $this->load->view('_parts/header', $head);
        // $this->load->view('ecommerce/publish', $data);
        // $this->load->view('_parts/footer');
        // $this->saveHistory('Go to publish product');

        /* Render Page */
        $site = $this->mConfig->list_config();
        $data['title'] = 'Admin - Tambah Produk Baru';
        if ($id) {
            $data['title'] = 'Admin - Ubah Produk';
        }
        $data['site'] = $site;
        $data['isi'] = 'admin/ecommerce/publish';
        
        $this->load->view('admin/layout/wrapper',$data);
    }

    private function uploadImage($oldImage = null)
    {   
        $upload_path = './img/product/';
        $upload_path_temp = './img/product/temp';
        $config['upload_path'] = $upload_path_temp;
        // $config['allowed_types'] = $this->allowed_img_types;
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['quality'] = '50%';
        $config['max_size'] = 5*1024;

         /*random image name*/
        $fileName = md5(date('ymdhis').rand(10,100));
        $config['file_name'] = $fileName;

        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('userfile')) {
            log_message('error', 'Image Upload Error: ' . $this->upload->display_errors());
            var_dump($this->upload->display_errors());exit;
        } else {
            $data=$this->upload->data();    
            $this->resize($data,1024,$upload_path);        
            // $this->resize($data,100,true);       
            unlink($data['full_path']);       
        }
        $img = $this->upload->data();

        /*if change image / edit old product*/
        if (!(empty($oldImage))) {
            unlink($upload_path.$oldImage);
            unlink($upload_path.$oldImage.'/thumb');
        }

        return $img['file_name'];
    }

    /*Upload video*/
    private function uploadVideo()
    {   
        $upload_path = './video/shop/';
        $upload_path_temp = './video/shop/temp';
        $config['upload_path'] = $upload_path;
        // $config['allowed_types'] = $this->allowed_img_types;
        $config['allowed_types'] = 'wmv|mp4|avi|mov';
        // $config['quality'] = '50%';
        $config['max_size'] = 50*1024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('videofile')) {
            log_message('error', 'Image Upload Error: ' . $this->upload->display_errors());
            var_dump($this->upload->display_errors());exit;
        } 

        $video = $this->upload->data();
        return $video['file_name'];
    }
    /*
     * called from ajax
     */

    public function do_upload_others_images()
    {
        if ($this->input->is_ajax_request()) {
            $upath = '.' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . $_POST['folder'] . DIRECTORY_SEPARATOR;

            $upload_path =  $upath;
            $upload_path_temp = './img/product/temp';

            if (!file_exists($upath)) {
                mkdir($upath, 0777);
            }

            $this->load->library('upload');

            $files = $_FILES;
            $cpt = count($_FILES['others']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                unset($_FILES);
                $_FILES['others']['name'] = $files['others']['name'][$i];
                $_FILES['others']['type'] = $files['others']['type'][$i];
                $_FILES['others']['tmp_name'] = $files['others']['tmp_name'][$i];
                $_FILES['others']['error'] = $files['others']['error'][$i];
                $_FILES['others']['size'] = $files['others']['size'][$i];

                $this->upload->initialize(array(
                    // 'upload_path' => $upath,
                    'upload_path' => $upload_path_temp,
                    'max_size' => 1024*5,
                    // 'allowed_types' => $this->allowed_img_types
                    'allowed_types' => 'jpg|jpeg|png|webp'
                ));

                // $this->upload->do_upload('others');

                if (!$this->upload->do_upload('others')) {
                    log_message('error', 'Image Upload Error: ' . $this->upload->display_errors());
                    var_dump($this->upload->display_errors());exit;
                } else {
                    $data=$this->upload->data();    
                    $this->resize($data,1024,$upload_path);        
                    // $this->resize($data,100,true);       
                    unlink($data['full_path']);       
                }
            }
        }
    }

    public function loadOthersImages()
    {
        $output = '';
        if (isset($_POST['folder']) && $_POST['folder'] != null) {
            $dir = 'img' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . $_POST['folder'] . DIRECTORY_SEPARATOR;
            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    $i = 0;
                    while (($file = readdir($dh)) !== false) {
                        if (is_file($dir . $file)) {
                            $output .= '
                                <div class="other-img" id="image-container-' . $i . '">
                                    <img src="' . base_url('img/shop/' . $_POST['folder'] . '/' . $file) . '" style="width:100px; height: 100px;">
                                    <a href="javascript:void(0);" onclick="removeSecondaryProductImage(\'' . $file . '\', \'' . $_POST['folder'] . '\', ' . $i . ')">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </div>
                               ';
                        }
                        $i++;
                    }
                    closedir($dh);
                }
            }
        }
        if ($this->input->is_ajax_request()) {
            echo $output;
        } else {
            return $output;
        }
    }

    function resize($data,$thumb_size,$new_path,$create_thumb = false)    
    {       
        $config['image_library'] = 'gd2';    
        $config['source_image'] =$data['full_path'];     
        // $config['new_image'] = './img/shop/'.$data['file_name']; 
        $config['new_image'] = $new_path;
        $config['create_thumb'] = $create_thumb;    
        $config['maintain_ratio'] = TRUE;    
        $config['width'] = $thumb_size;     
        // $config['height'] = $thumb;     
        $this->load->library('image_lib', $config);    
        $this->image_lib->resize();    
        if ( ! $this->image_lib->resize())
        {
            echo $this->image_lib->display_errors();
            exit();
        }
    }  

    /*
     * called from ajax
     */

    public function removeSecondaryImage()
    {
        if ($this->input->is_ajax_request()) {
            $img = '.' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . '' . $_POST['folder'] . DIRECTORY_SEPARATOR . $_POST['image'];
            unlink($img);
        }
    }

}
