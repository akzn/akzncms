<?php

class Products_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function deleteProduct($id)
    {
        $this->db->trans_begin();

        $this->db->where('id', $id);
        if (!$this->db->delete('products')) {
            log_message('error', print_r($this->db->error(), true));
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            show_error(lang('database_error'));
        } else {
            $this->db->trans_commit();
        }
    }

    public function productsCount($search_title = null, $category = null)
    {
        if ($search_title != null) {
            $search_title = trim($this->db->escape_like_str($search_title));
            $this->db->where("(title LIKE '%$search_title%')");
        }
        if ($category != null) {
            $this->db->where('shop_categorie', $category);
        }
        // $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        // $this->db->where('products_translations.abbr', MY_DEFAULT_LANGUAGE_ABBR);
        return $this->db->count_all_results('products');
    }

    public function getProducts($limit, $page, $search_title = null, $orderby = null, $category = null, $vendor = null)
    {
        if ($search_title != null) {
            $search_title = trim($this->db->escape_like_str($search_title));
            $this->db->where("(title LIKE '%$search_title%')");
        }
        if ($orderby !== null) {
            $ord = explode('=', $orderby);
            if (isset($ord[0]) && isset($ord[1])) {
                $this->db->order_by('products.' . $ord[0], $ord[1]);
            }
        } else {
            $this->db->order_by('products.id', 'desc');
        }
        if ($category != null) {
            $this->db->where('shop_categorie', $category);
        }
        if ($vendor != null) {
            $this->db->where('vendor_id', $vendor);
        }
        // $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
        // $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        // $this->db->where('products_translations.abbr', MY_DEFAULT_LANGUAGE_ABBR);
        // $query = $this->db->select('vendors.name as vendor_name, vendors.id as vendor_id, products.*, products_translations.title, products_translations.description, products_translations.price, products_translations.old_price, products_translations.abbr, products.url, products_translations.for_id, products_translations.basic_description')->get('products', $limit, $page);

        $query = $this->db->select(' products.*, title, description, price, old_price, products.url, basic_description')->get('products', $limit, $page);

        return $query->result();
    }

    public function numShopProducts()
    {
        return $this->db->count_all_results('products');
    }

    public function getOneProduct($id)
    {
        $this->db->select('*');
        $this->db->where('products.id', $id);
        
        $query = $this->db->get('products');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function productStatusChange($id, $to_status)
    {
        $this->db->where('id', $id);
        $result = $this->db->update('products', array('visibility' => $to_status));
        return $result;
    }

    public function checkSameProductName($post){
        $post['title'] = str_replace('"', "'", $post['title']);
        $this->db->where('title',$post['title']);
        return $this->db->get('products')->num_rows();
    }

    public function setProduct($post, $id = 0)
    {   
        /*
        * karena ini ambilan dari source code yg ada translation dan diputuskan disini ngga pake, maka alur simpan nya aga loncat2
        * simpan dulu baru bikin slug..., 
        */

        if (!isset($post['brand_id'])) {
            $post['brand_id'] = null;
        }
        if (!isset($post['virtual_products'])) {
            $post['virtual_products'] = null;
        }
        
        $this->db->trans_begin();
        $is_update = false;

        /*Clean title and post*/
        $post['title'] = str_replace('"', "'", $post['title']);
        $post['price'] = str_replace(' ', '', $post['price']);
        $post['price'] = str_replace(',', '.', $post['price']);
        $post['price'] = preg_replace("/[^0-9,.]/", "", $post['price']);
        $post['old_price'] = str_replace(' ', '', $post['old_price']);
        $post['old_price'] = str_replace(',', '.', $post['old_price']);
        $post['old_price'] = preg_replace("/[^0-9,.]/", "", $post['old_price']);


        if ($id > 0) {
            /*
             * Edit
             */
            $is_update = true;
            if (!$this->db->where('id', $id)->update('products', array(
                        'image' => $post['image'] != null ? $_POST['image'] : $_POST['old_image'],
                        'video' => $post['video'] != null ? $_POST['video'] : $_POST['old_video'],
                        'shop_categorie' => $post['shop_categorie'],
                        'quantity' => $post['quantity'],
                        'in_slider' => $post['in_slider'],
                        'position' => $post['position'],
                        'virtual_products' => $post['virtual_products'],
                        'brand_id' => $post['brand_id'],
                        'time_update' => time(),

                        'title' => $post['title'],
                        'basic_description' => $post['basic_description'],
                        'description' => $post['description'],
                        'price' => $post['price'],
                        'old_price' => $post['old_price'],                        
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
        } else {
            if (!$this->db->insert('products', array(
                        'image' => $post['image'],
                        'video' => $post['video'],
                        'shop_categorie' => $post['shop_categorie'],
                        'quantity' => $post['quantity'],
                        'in_slider' => $post['in_slider'],
                        'position' => $post['position'],
                        'virtual_products' => $post['virtual_products'],
                        'folder' => $post['folder'],
                        'brand_id' => $post['brand_id'],
                        'time' => time(),


                        'title' => $post['title'],
                        'basic_description' => $post['basic_description'],
                        'description' => $post['description'],
                        'price' => $post['price'],
                        'old_price' => $post['old_price'],
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
            $id = $this->db->insert_id();

            $this->db->where('id', $id);
            /*if (!$this->db->update('products', array(
                        'url' => except_letters($_POST['title'][$myTranslationNum]) . '_' . $id
                    ))) {*/

            /* Make Slug*/
            if (!$this->db->update('products', array(
                    'url' => slugify($_POST['title']). '_' . $id
                ))) {

                log_message('error', print_r($this->db->error(), true));
            }
        }
        // $this->setProductTranslation($post, $id, $is_update);
        $this->setProductSpecification($post, $id, $is_update);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            show_error(lang('database_error'));
        } else {
            $this->db->trans_commit();
        }
    }

    private function setProductSpecification($post, $id){

        foreach ($post['cat_spec_value'] as $key=>$value) {
            // $post['cat_spec'] = $key;
            // echo $key;
            // echo $value;
            $id_spec = $key;
            #search spec from produc_spec, if present, update, otherwise insert
            $get_check = $this->db->where('product_id',$id)->where('product_category_specification_id',$id_spec)->get('product_specification')->row();

            if ($get_check) {
                $data = array(
                    'value' => $value, 
                );
                // var_dump($data);
                $this->db->where('product_id',$id)->where('product_category_specification_id',$id_spec)->update('product_specification',$data);
            } else {
                $data = array(
                    'product_id' => $id,
                    'product_category_specification_id' => $id_spec,
                    'value' => $value, 
                );
                // var_dump($data);
                $this->db->insert('product_specification',$data);
            }
        }
        // var_dump($_POST['cat_spec_value']);
        // exit;

        
    }

    private function setProductTranslation($post, $id, $is_update)
    {
        $i = 0;
        $current_trans = $this->getTranslations($id);
        foreach ($post['translations'] as $abbr) {
            $arr = array();
            $emergency_insert = false;
            if (!isset($current_trans[$abbr])) {
                $emergency_insert = true;
            }
            $post['title'][$i] = str_replace('"', "'", $post['title'][$i]);
            $post['price'][$i] = str_replace(' ', '', $post['price'][$i]);
            $post['price'][$i] = str_replace(',', '.', $post['price'][$i]);
            $post['price'][$i] = preg_replace("/[^0-9,.]/", "", $post['price'][$i]);
            $post['old_price'][$i] = str_replace(' ', '', $post['old_price'][$i]);
            $post['old_price'][$i] = str_replace(',', '.', $post['old_price'][$i]);
            $post['old_price'][$i] = preg_replace("/[^0-9,.]/", "", $post['old_price'][$i]);
            $arr = array(
                'title' => $post['title'][$i],
                'basic_description' => $post['basic_description'][$i],
                'description' => $post['description'][$i],
                'price' => $post['price'][$i],
                'old_price' => $post['old_price'][$i],
                'abbr' => $abbr,
                'for_id' => $id
            );
            if ($is_update === true && $emergency_insert === false) {
                $abbr = $arr['abbr'];
                unset($arr['for_id'], $arr['abbr'], $arr['url']);
                if (!$this->db->where('abbr', $abbr)->where('for_id', $id)->update('products_translations', $arr)) {
                    log_message('error', print_r($this->db->error(), true));
                }
            } else {
                if (!$this->db->insert('products_translations', $arr)) {
                    log_message('error', print_r($this->db->error(), true));
                }
            }
            $i++;
        }
    }

    public function getTranslations($id)
    {
        $this->db->where('for_id', $id);
        $query = $this->db->get('products_translations');
        $arr = array();
        foreach ($query->result() as $row) {
            $arr[$row->abbr]['title'] = $row->title;
            $arr[$row->abbr]['basic_description'] = $row->basic_description;
            $arr[$row->abbr]['description'] = $row->description;
            $arr[$row->abbr]['price'] = $row->price;
            $arr[$row->abbr]['old_price'] = $row->old_price;
        }
        return $arr;
    }

}
