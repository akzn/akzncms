<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_address extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'full_name' => array(
                                'type' => 'varchar',
                                'constraint' => 50,
                        ),
                        'phone' => array(
                                'type' => 'varchar',
                                'constraint' => 25,
                        ),
                        'address' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                        'is_main' => array(
                                'type' => 'enum("0","1")',
                                'null' => false,
                                'default'=>'1',
                        ),
                        'active' => array(
                                'type' => 'enum("0","1")',
                                'null' => false,
                                'default'=>'1',
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('user_address');

                // foreach ($this->seedData as $seed ) {
                //     $sql = 'INSERT INTO user_address(slider_image) VALUES '.$seed;
                //     $this->db->query($sql);
                // }
        }

        public function down()
        {
                $this->dbforge->drop_table('user_address');
        }

        // private $seedData = array(
        //         '("slider_1")',
        //         '("slider_2")',
        //         '("slider_3")',
        // );
}