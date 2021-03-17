<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_testimonials extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'testimonial_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'client_name' => array(
                                'type' => 'varchar',
                                'constraint' => 50,
                        ),
                        'occupation' => array(
                                'type' => 'varchar',
                                'constraint' => 50,
                        ),
                        'company' => array(
                                'type' => 'varchar',
                                'constraint' => 50,
                        ),
                        'testimony' => array(
                                'type' => 'text',
                                'null' => true,
                        ),
                        'image' => array(
                                'type' => 'text',
                                'null' => true,
                        ),
                        'slug_testimonial' => array(
                                'type' => 'text',
                                'null' => true,
                        ),
                        'date_created' => array(
                                'type' => 'text',
                                'null' => true,
                        ),
                        'date_updated' => array(
                                'type' => 'text',
                                'null' => true,
                        ),
                        'status' => array(
                                'type' => 'enum("publish","draft")',
                                'null' => false,
                                'default'=>'draft',
                        ),
                ));
                $this->dbforge->add_key('testimonial_id', TRUE);
                $this->dbforge->create_table('testimonials');

        }

        public function down()
        {
                $this->dbforge->drop_table('testimonials');
        }

}