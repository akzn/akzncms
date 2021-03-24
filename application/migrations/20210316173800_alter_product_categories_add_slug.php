<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_product_categories_add_slug extends CI_Migration {

        public function up()
        {
                $fields = array(
                        'slug' => array(
                                'type' => 'varchar',
                                'null' => false,
                                'constraint' => 255,
                                'default' => 'untitled', 
                                'after' => 'name'
                        ),
                );
                $this->dbforge->add_column('product_categories', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('product_categories', 'slug');
        }
}