<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_product_categories_add_description extends CI_Migration {

        public function up()
        {
                $fields = array(
                        'category_description' => array(
                                'type' => 'text',
                                'null' => true, 
                                'after' => 'name'
                        ),
                );
                $this->dbforge->add_column('product_categories', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('product_categories', 'category_description');
        }
}