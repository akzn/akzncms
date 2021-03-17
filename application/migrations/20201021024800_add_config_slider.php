<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_config_slider extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'slider_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'slider_image' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                        'slider_title' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                        'slider_description' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                ));
                $this->dbforge->add_key('slider_id', TRUE);
                $this->dbforge->create_table('config_slider');

                foreach ($this->seedData as $seed ) {
                    $sql = 'INSERT INTO config_slider(slider_image) VALUES '.$seed;
                    $this->db->query($sql);
                }
        }

        public function down()
        {
                $this->dbforge->drop_table('config_slider');
        }

        private $seedData = array(
                '("slider_1")',
                '("slider_2")',
                '("slider_3")',
        );
}