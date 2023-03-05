<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alterProductCategory_addColumn_active extends CI_Migration {

        public function up()
        {
                $fields = array(
                        'active' => array(
                                'type' => 'int',
                                'null' => false,
                                'constraint' => 11,
                                'default' => '1', 
                                'after' => 'position'
                        ),
                );
                $this->dbforge->add_column('product_categories', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('product_categories', 'active');
        }
}