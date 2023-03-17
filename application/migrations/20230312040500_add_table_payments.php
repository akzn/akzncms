<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_table_payments extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'order_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'gross_amount' => array(
                                'type' => 'BIGINT',
                        ),
                        'payment_type' => array(
                                'type' => 'enum("1","2")',
                                'null' => false,
                        ),
                        'interest_rate' => array(
                                'type' => 'INT',
                        ),
                        'tenor' => array(
                                'type' => 'INT',
                        ),
                        'status_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'default' => '1'
                        ),
                        'create_date timestamp default current_timestamp',
                        'update_date timestamp default current_timestamp on update current_timestamp'
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('payments');

                // foreach ($this->seedData as $seed ) {
                //     $sql = "INSERT INTO payment(name,description) VALUES ".$seed;
                //     $this->db->query($sql);
                // }
        }

        public function down()
        {
                $this->dbforge->drop_table('payments');
        }

        // private $seedData = array(
        //         '("pending" , "description text for status")',
        //         '("canceled", "description text for status")',
        //         '("completed", "description text for status")',
        // );
}