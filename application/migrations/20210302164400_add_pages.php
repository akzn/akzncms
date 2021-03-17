<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_pages extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'pages_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'page_name' => array(
                                'type' => 'varchar',
                                'constraint' => 50,
                        ),
                        'slug' => array(
                                'type' => 'text',
                                'null' => true,
                                'default' => null, 
                        ),
                        'metatitle' => array(
                                'type' => 'text',
                                'null' => true,
                                'default' => null, 
                        ),
                        'metatext' => array(
                                'type' => 'text',
                                'null' => true,
                                'default' => null, 
                        ),
                        'content' => array(
                                'type' => 'text',
                                'null' => true,
                                'default' => null, 
                        ),
                ));
                $this->dbforge->add_key('pages_id', TRUE);
                $this->dbforge->create_table('pages');

        }

        public function down()
        {
                $this->dbforge->drop_table('pages');
        }

}