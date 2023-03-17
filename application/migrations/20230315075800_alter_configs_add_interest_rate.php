<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_configs_add_interest_rate extends CI_Migration {

        public function up()
        {
                $fields = array(
                        'interest_rate' => array(
                                'type' => 'int',
                                'null' => false,
                        ),
                );
                $this->dbforge->add_column('config', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('config', 'interest_rate');
        }
}