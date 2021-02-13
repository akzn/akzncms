<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_config_add_admin_show_link extends CI_Migration {

        public function up()
        {
                $fields = array(
                        'admin_show_link' => array(
                                'type' => 'int',
                                'null' => FALSE,
                                'default' => 0, 
                                'after' => 'fax'
                        ),
                );
                $this->dbforge->add_column('config', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('config', 'admin_show_link');
        }
}