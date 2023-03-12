<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_table_payment_status extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'name' => array(
                                'type' => 'varchar',
                                'constraint' => 20,
                        ),
                        'description' => array(
                                'type' => 'text',
                        ),
                        'active' => array(
                                'type' => 'enum("0","1")',
                                'null' => false,
                                'default'=>'1',
                        ),
                        'create_date timestamp default current_timestamp',
                        'update_date timestamp default current_timestamp on update current_timestamp'
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('payment_status');

                foreach ($this->seedData as $seed ) {
                    $sql = "INSERT INTO payment_status(name,description) VALUES ".$seed;
                    $this->db->query($sql);
                }
        }

        public function down()
        {
                $this->dbforge->drop_table('payment_status');
        }

        private $seedData = array(
                '("pending" , "description text for status")',
                '("in_installment", "description text for status")',
                '("settlement", "description text for status")',
                '("canceled", "description text for status")',
        );
}