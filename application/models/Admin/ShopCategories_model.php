<?php

class ShopCategories_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function categoriesCount()
    {
        return $this->db->count_all_results('product_categories');
    }

    public function getShopCategories($limit = null, $start = null)
    {
        $limit_sql = '';
        if ($limit !== null && $start !== null) {
            $limit_sql = ' LIMIT ' . $start . ',' . $limit;
        }

        // $query = $this->db->query('SELECT translations_first.*, (SELECT name FROM product_categories_translations WHERE for_id = sub_for AND abbr = translations_first.abbr) as sub_is, product_categories.position FROM product_categories_translations as translations_first INNER JOIN product_categories ON product_categories.id = translations_first.for_id ORDER BY position ASC ' . $limit_sql);
        $query = $this->db->query('SELECT *,(SELECT name FROM product_categories WHERE id = a.sub_for) as sub_is from product_categories a ORDER BY active desc,position ASC  ' . $limit_sql);
        $arr = array();
        foreach ($query->result() as $shop_categorie) {
            $arr[$shop_categorie->id]['info'][] = array(
                'abbr' => $shop_categorie->abbr,
                'name' => $shop_categorie->name
            );
            $arr[$shop_categorie->id]['sub'][] = $shop_categorie->sub_is;
            $arr[$shop_categorie->id]['position'] = $shop_categorie->position;
            $arr[$shop_categorie->id]['active'] = $shop_categorie->active;
        }
        return $arr;
    }

    public function getShopCategoriesActive($limit = null, $start = null)
    {
        $limit_sql = '';
        if ($limit !== null && $start !== null) {
            $limit_sql = ' LIMIT ' . $start . ',' . $limit;
        }

        // $query = $this->db->query('SELECT translations_first.*, (SELECT name FROM product_categories_translations WHERE for_id = sub_for AND abbr = translations_first.abbr) as sub_is, product_categories.position FROM product_categories_translations as translations_first INNER JOIN product_categories ON product_categories.id = translations_first.for_id ORDER BY position ASC ' . $limit_sql);
        $query = $this->db->query("SELECT *,(SELECT name FROM product_categories WHERE id = a.sub_for) as sub_is from product_categories a where a.active='1' ORDER BY active desc,position ASC  " . $limit_sql);
        $arr = array();
        foreach ($query->result() as $shop_categorie) {
            $arr[$shop_categorie->id]['info'][] = array(
                'abbr' => $shop_categorie->abbr,
                'name' => $shop_categorie->name
            );
            $arr[$shop_categorie->id]['sub'][] = $shop_categorie->sub_is;
            $arr[$shop_categorie->id]['position'] = $shop_categorie->position;
            $arr[$shop_categorie->id]['active'] = $shop_categorie->active;
        }
        return $arr;
    }

    public function deleteShopCategorie($id)
    {
        $this->db->trans_begin();

        $this->db->where('id', $id);
        $this->db->or_where('sub_for', $id);
        if (!$this->db->update('product_categories',array('active'=>'0'))) {
            log_message('error', print_r($this->db->error(), true));
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            show_error(lang('database_error'));
        } else {
            $this->db->trans_commit();
        }
    }

    public function setShopCategorie($post)
    {
        $this->db->trans_begin();
        if (!$this->db->insert('product_categories', array(
                'sub_for' => $post['sub_for'],
                'name' => $post['categorie_name']
            ))) {
            log_message('error', print_r($this->db->error(), true));
        }
        $id = $this->db->insert_id();

        $i = 0;
        foreach ($post['translations'] as $abbr) {
            $arr = array();
            $arr['abbr'] = $abbr;
            $arr['name'] = $post['categorie_name'][$i];
            $arr['for_id'] = $id;
            if (!$this->db->insert('product_categories_translations', $arr)) {
                log_message('error', print_r($this->db->error(), true));
            }
            $i++;
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            show_error(lang('database_error'));
        } else {
            $this->db->trans_commit();
        }
    }

    public function editShopCategorieSub($post)
    {
        $result = true;
        if ($post['editSubId'] != $post['newSubIs']) {
            $this->db->where('id', $post['editSubId']);
            if (!$this->db->update('product_categories', array(
                        'sub_for' => $post['newSubIs']
                    ))) {
                log_message('error', print_r($this->db->error(), true));
                show_error(lang('database_error'));
            }
        } else {
            $result = false;
        }
        return $result;
    }

    public function editShopCategorie($post)
    {
        // $this->db->where('abbr', $post['abbr']);
        $this->db->where('id', $post['for_id']);
        if (!$this->db->update('product_categories', array(
                    'name' => $post['name']
                ))) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }

    public function editShopCategoriePosition($post)
    {
        $this->db->where('id', $post['editid']);
        if (!$this->db->update('product_categories', array(
                    'position' => $post['new_pos']
                ))) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }


    public function spesificationCount($filter = null)
    {
        if ($filter) {
            if ($filter['cat']) {
                $this->db->where('product_categories_id',$filter['cat']);
            }
            if ($filter['type']) {
                $this->db->where('spec_type',$filter['type']);
            }
        }

        return $this->db->count_all_results('product_category_specification');
    }

    public function getSpesification($limit = null, $start = null, $filter = null)
    {
        // $limit_sql = '';
        // if ($limit !== null && $start !== null) {
        //     $limit_sql = ' LIMIT ' . $start . ',' . $limit;
        // }
        // $filter_cat = '';
        // if ($filter['cat']) {
        //     $filter_cat = ' '
        // }
        // $filter_cat = '';

        // $query = $this->db->query('SELECT *,(SELECT spec_name FROM product_category_sepsification WHERE id = a.sub_for) as sub_is from product_category_sepsification a ORDER BY position ASC ' . $limit_sql);

        // $query =$this->db->query('SELECT * 
        //     from product_category_specification a 
        //     join product_categories b on a.product_categories_id = b.id

        //     ' . $limit_sql);

        // if ($filter) {
        //     if ($filter['cat']) {
        //         $this->db->where('product_categories_id',$filter['cat']);
        //     }
        //     if ($filter['type']) {
        //         $this->db->where('spec_type',$filter['type']);
        //     }
        // }

        $this->db->join('product_categories b','a.product_categories_id = b.id');
        return $this->db->get('product_category_specification a',$limit,$start)->result();

        // return $query->result();
    }

    public function getSpesificationAll($filter = null,$id = null)
    {
        if ($filter) {
            if ($filter['cat']) {
                $this->db->where('product_categories_id',$filter['cat']);
            }
            if ($filter['type']) {
                $this->db->where('spec_type',$filter['type']);
            }
        }

        if ($id) {
            $this->db->join('(SELECT * FROM product_specification WHERE `product_id` = '.$id.') c','a.specification_id = c.product_category_specification_id','left');
        }

        $this->db->join('product_categories b','a.product_categories_id = b.id');
        return $this->db->get('product_category_specification a')->result();
        
        // $this->db->get('product_category_specification a')->result();
        // var_dump($this->db->last_query());
    }

    public function addSpesificationCategorie(){
        $this->db->trans_begin();
        $data = array(
            'spec_name' => $this->input->post('spec_name'), 
            'product_categories_id' => $this->input->post('cat'), 
            'spec_type' => $this->input->post('type'), 
        );

        $this->db->insert('product_category_specification',$data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            show_error(lang('database_error'));
        } else {
            $this->db->trans_commit();
        }
    }

    public function deleteSpesificationCategorie($id)
    {

        $this->db->trans_begin();

        $this->db->where('specification_id', $id);
        if (!$this->db->delete('product_category_specification')) {
            log_message('error', print_r($this->db->error(), true));
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            show_error(lang('database_error'));
        } else {
            $this->db->trans_commit();
        }
    }

}
