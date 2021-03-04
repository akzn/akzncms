<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_config_add_meta_title extends CI_Migration {

        public function up()
        {
                $fields = array(
                        'metatitle' => array(
                                'type' => 'text',
                                'null' => true,
                                'default' => null, 
                                'after' => 'phone_number'
                        ),
                );
                $this->dbforge->add_column('config', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('config', 'metatitle');
        }
}