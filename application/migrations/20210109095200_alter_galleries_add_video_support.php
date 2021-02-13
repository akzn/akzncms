<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_galleries_add_video_support extends CI_Migration {

        public function up()
        {
                $fields = array(
                        'type' => array(
                                'type' => 'varchar',
                                'constraint' => 25,
                                'null' => true, 
                                'after' => 'position'
                        ),
                        'video_url' => array(
                                'type' => 'text',
                                'null' => true, 
                                'after' => 'type'
                        ),
                );
                $this->dbforge->add_column('galleries', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('galleries', 'type');
                $this->dbforge->drop_column('galleries', 'video_url');
        }
}