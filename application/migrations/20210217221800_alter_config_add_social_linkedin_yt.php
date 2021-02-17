<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_config_add_social_linkedin_yt extends CI_Migration {

        public function up()
        {
                $fields = array(
                        'youtube' => array(
                                'type' => 'varchar',
                                'null' => true,
                                'constraint' => 255,
                                'default' => null, 
                                'after' => 'pinterest'
                        ),
                        'linkedin' => array(
                                'type' => 'varchar',
                                'null' => true,
                                'constraint' => 255,
                                'default' => null, 
                                'after' => 'pinterest'
                        ),
                );
                $this->dbforge->add_column('config', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('config', 'youtube');
                $this->dbforge->drop_column('config', 'linkedin');
        }
}