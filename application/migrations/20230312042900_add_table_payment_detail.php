<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_table_payment_detail extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'transaction_id' => array(
                                'type' => 'char',
                                'constraint' => 32,
                                'null' => false,
                        ),
                        'payment_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'amount' => array(
                                'type' => 'BIGINT',
                        ),
                        'payment_type' => array(
                                'type' => 'enum("1","2","3")',
                                'default' => '1',
                        ),
                        'due_date' => array(
                                'type' => 'datetime',
                        ),
                        'payment_gateway_transaction_id' => array(
                                'type' => 'varchar',
                                'constraint' => 36,
                                'null' => true,
                        ),
                        'payment_gateway_transaction_status' => array(
                                'type' => 'varchar',
                                'constraint' => 20,
                                'null' => true,
                        ),
                        'expiry_time' => array(
                                'type' => 'datetime',
                        ),
                        'create_date timestamp default current_timestamp',
                        'update_date timestamp default current_timestamp on update current_timestamp'
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('payment_detail');

                // foreach ($this->seedData as $seed ) {
                //     $sql = 'INSERT INTO user_address(slider_image) VALUES '.$seed;
                //     $this->db->query($sql);
                // }
        }

        public function down()
        {
                $this->dbforge->drop_table('payment_detail');
        }

        // private $seedData = array(
        //         '("slider_1")',
        //         '("slider_2")',
        //         '("slider_3")',
        // );
}