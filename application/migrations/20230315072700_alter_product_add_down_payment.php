<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_product_add_down_payment extends CI_Migration {

        public function up()
        {
                $fields = array(
                        'down_payment' => array(
                                'type' => 'int',
                                'null' => false,
                                'after' => 'old_price'
                        ),
                );
                $this->dbforge->add_column('products', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('products', 'down_payment');
        }
}