<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_table_orders extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'order_code' => array(
                                'type' => 'varchar',
                                'constraint' => 18,
                        ),
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'product_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'address_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'order_status_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'gross_amount' => array(
                                'type' => 'BIGINT',
                        ),
                        'create_date timestamp default current_timestamp',
                        'update_date timestamp default current_timestamp on update current_timestamp'
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('orders');

                // foreach ($this->seedData as $seed ) {
                //     $sql = 'INSERT INTO user_address(slider_image) VALUES '.$seed;
                //     $this->db->query($sql);
                // }
        }

        public function down()
        {
                $this->dbforge->drop_table('orders');
        }

        // private $seedData = array(
        //         '("slider_1")',
        //         '("slider_2")',
        //         '("slider_3")',
        // );
}