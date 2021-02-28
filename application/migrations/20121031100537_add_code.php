<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_code extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'code_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'code_title' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'source_code' => array(
                                'type' => 'TEXT',
                        ),
                ));
                $this->dbforge->add_key('code_id', TRUE);
                $this->dbforge->create_table('code');
        }

        public function down()
        {
                $this->dbforge->drop_table('code');
        }
}