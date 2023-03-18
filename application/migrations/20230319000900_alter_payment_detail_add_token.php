<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_payment_detail_add_token extends CI_Migration {

        public function up()
        {
                $fields = array(
                        'payment_gateway_token' => array(
                                'type' => 'varchar',
                                'constraint' => 36,
                                'after' => 'due_date'
                        ),
                );
                $this->dbforge->add_column('payment_detail', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('payment_detail', 'payment_gateway_token');
        }
}