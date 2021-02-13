<?php

/*
 * @Author:    Andika Bayu
 *  Github:    https://github.com/akzn
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ExportExcel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Brands_model');
        $this->admin_login->cek_login();
        if ($this->session->userdata('userlevel')!='administrator') {
            // $this->response->setStatusCode(401, 'Unauthorized page, if you think there is something wrong, please call webmaster');
            $this->output->set_status_header(401);
            echo "Unauthorized page, if you think there is something wrong, please call webmaster";
            exit;
        }
    }

    public function index()
    {
        $this->load->helper('form');

        $head['title'] = 'Administration - Import Excel';

        $page = $_GET['page'];

            echo '<h2>'.$head['title'].'</h2><br>';

            echo '<a href="'.base_url('admin').'"> Back to admin page</a>';
            echo "<br><br>";

            echo '<a href="'.base_url('admin/excel?page=import-product-data').'"> Go to import product data</a>';
            echo "<br>";
            echo '<a href="'.base_url('admin/excel?page=import-product-specification').'"> Go to import product specification</a>';
            
        if (!$page) {
            exit;
        }

        echo "<h1>".$page."</h1>";
        
        $frmattr = array('enctype' => "multipart/form-data", ); 
        echo form_open('admin/excel?page='.$page,$frmattr);
        ?>
            <input type="file" name="excel">
            <input type="submit" name="submit">   
        <?php
        echo form_close();

        if ($_POST['submit']) {
            //upload excel

            //Begin Upload
            $config['upload_path'] = realpath('uploads/excel/');
            $config['allowed_types'] = 'xlsx|xls|csv';
            $config['max_size'] = '10000';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('excel')) {
                var_dump($this->upload->display_errors());
            } else {

                # Read Excel
                include APPPATH.'third_party/PHPExcel.php';

                $data_upload=$this->upload->data();

                echo('Processing Excel file <br><br>');

                //read excel
                $excelreader     = new PHPExcel_Reader_Excel2007();
                // $excelreader     = PHPExcel_IOFactory::createReader('Excel2007');
                $excelreader->setReadDataOnly(true);
                $loadexcel         = $excelreader->load($data_upload['full_path']);
                $worksheet = $loadexcel->getActiveSheet();

                //
                $headings = $worksheet->rangeToArray('A5:' . $worksheet->getHighestColumn() . 5,
                                            NULL,
                                            TRUE,
                                            FALSE);

                $column = 'A';
                $lastRow = $worksheet->getHighestRow();
                $firstRow = 6;
                for ($row = $firstRow; $row <= $lastRow; $row++) {
                    // $cell = $worksheet->getCell($column.$row);
                    $celldata = $worksheet->rangeToArray($column . $row . ':' . $worksheet->getHighestColumn() . $row);
                    $celldata = $celldata[0];
                    // $product_name = $cell->getValue();

                    // kondisi sesuai page yang diminta
                    if ($page == 'import-product-data') {
                        $this->process_product_data($celldata);
                    } else if ($page == 'import-product-specification'){
                        $celldata = array_combine($headings[0], $celldata);
                        $this->process_product_spesification($celldata);
                    }
                }

                unlink(realpath('uploads/excel/'.$data_upload['file_name']));

            } //end upload excel

        }
    }

    private function process_product_data($celldata){
        # Function to process 
        /*
            FOR NOW its loking for same product name to determine a product  is exist or not.

            - check if product name exist
            - workaround if cell product name is null (gethingestrow() fetch all cell with a data even if its null value) 
        */
        $product_name = $celldata[0];
        if ($product_name) {
            // echo($product_name);
            
            # check on db
            $this->db->where('title',$product_name);
            $get_product = $this->db->get('products')->row();
            
            # if product name not exist, insert new, then go to spec method
            # if exist, go to spec method
            if (($get_product)>0) {
                echo($product_name.' is exist <br>');
                echo('Updating <br>');
                $product_id = $get_product->id;
                $this->set_product($celldata,$product_id);
                echo('Update done<br><br>');
            } else {
                echo($product_name.' not exist <br>');
                echo('creating new product<br>');
                $this->set_product($celldata);
                echo('Create done<br><br>');
            }
        }
    }

    private function set_product($celldata,$id = 0){

        # Function to save new product or update existing product to database


        $this->load->model('Admin/Products_model');
        $data_sheet = array();
        
        # get category id, if none, skip
        $category = $celldata[5];
        $category_data = $this->db->where('name',$category)->get('product_categories')->row();
        if ($category_data) {
            # code...
            $category_id = $category_data->id;

            array_push($data_sheet, array(
                    'title' => $celldata[0],
                    'description'      => $celldata[1],
                    'old_price'      => $celldata[2],
                    'price'      => $celldata[3],
                    'image' => $celldata[4],
                    'shop_categorie'      => $category_id,
                    'quantity'      => $celldata[6],
            ));

            $_POST['title'] = $celldata[0];
            $_POST['description'] = $celldata[1];
            $_POST['old_price']  = $celldata[2];
            $_POST['price']      = $celldata[3];
            $_POST['image'] = $celldata[4];
            $_POST['shop_categorie'] = $category_id;
            $_POST['quantity'] = $celldata[6];

            //required by product_model->setPRoduct();
            // $_POST['folder'] = slugify($_POST['title']).time();
            $_POST['folder'] = rand ( 100 , 999 ).time();
            $_POST['in_slider'] = 0;
            $_POST['position'] = 0;

            // var_dump($_POST);
            $this->Products_model->setProduct($_POST,$id);

            // var_dump($data_sheet);
        }
    }


    public function process_product_spesification($celldata){
        # Function to process (insert or update) product specification
        /*
            FOR NOW its loking for same product name to determine a product  is exist or not.
        */

        // var_dump($celldata);
        $product_name = $celldata['Product Name'];
        // echo $product_name;exit();
        if ($product_name) {
            # check on db and get product id
            $this->db->where('title',$product_name);
            $get_product = $this->db->get('products')->row();
            
            # if product name not exist, skip
            # if exist, process spec
            if (($get_product)>0) {
                echo($product_name.' is exist <br>');
                echo('Updating Specification<br>');
                $product_id = $get_product->id;
                $this->set_product_specification($celldata,$product_id);
                echo('Update done<br><br>');
            } 
        }
    } 

    private function set_product_specification($celldata,$id){
        # set product spec
        /*
            if hasnt set, insert, otherwise, update
        */

        # product id
        $product_id = $id;

        # spec
        foreach ($celldata as $key => $value) {
            # get spec category id from db
            
            $spec_id = $this->db->where('spec_name',$key)->get('product_category_specification')->row('specification_id');
           
            if ($spec_id) {
                $dataSet_arr = array(
                    'product_id' => $product_id,
                    'product_category_specification_id' => $spec_id,
                    'value' => $value,
                ); 

                // Check if spec is already inserted
                /*
                    if yes, update value
                    if no, insert new
                */

                $exist = $this->db->where('product_id', $product_id)->where('product_category_specification_id', $spec_id)->get('product_specification')->row();

                if ($exist) {
                    if ($value != $exist->value) {
                        $this->db->where('product_id', $product_id)->where('product_category_specification_id', $spec_id)->update('product_specification', array('value' => $value));
                    }
                } else {
                    $this->db->insert('product_specification',$dataSet_arr);
                }
            }
            
        }

    }

    public function resize_image(){
        $data_product = $this->db->get('products')->result();
        foreach ($data_product as $key) {
            // echo $key->image;
            
            $data['full_path'] = realpath('img/shop/temp/'.$key->image);
            $upload_path = './img/shop/temp2/';
            $upload_path_temp = './img/shop/temp/';
            // $data['full_path'] = $upload_path_temp.$key->image;
            

            if ($data['full_path']) {
                var_dump($data['full_path']);
                echo "<br>";
                echo "resizing<BR>";
                $resize = $this->resize($data,1024,$upload_path); 

                if ($resize) {
                           unlink($data['full_path']);
                       }       
                // unlink($data['full_path']);
            }
            
        }
        /*$data['full_path'] = realpath('img/shop/temp/').$file_name;  
        $this->resize($data,1024,$upload_path);        
        unlink($data['full_path']); */      
    }

    private function resize($data,$thumb_size,$new_path,$create_thumb = false)    
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
            return false;
        } else return true;
    }

}
 