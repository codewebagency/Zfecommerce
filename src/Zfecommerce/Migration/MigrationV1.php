<?php

namespace Zfecommerce\Migration;

use Zend\Db\Sql\Ddl;
use Zend\Db\Sql\Ddl\Column;
use Zend\Db\Sql\Ddl\Constraint;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Adapter;

class MigrationV1 implements MigrationInterface
{

    public function up()
    {
        $dbAdapterConfig = array(
            'driver'   => 'Mysqli',
            'database' => 'test',
            'username' => 'root',
            'password' => '',
            'charset'  => 'utf8'
        );
        $dbAdapter = new Adapter($dbAdapterConfig);
        $sql = new Sql($dbAdapter);
        $result = $dbAdapter->query(
            "SELECT table_name FROM information_schema.tables WHERE table_schema = 'test' AND table_name = 'eav_entity_type'",
            $dbAdapter::QUERY_MODE_EXECUTE
        );
        $count = $result->count();
        if($count == 0) {
            $result = $dbAdapter->query(
                "create table eav_entity_type (
                     entity_type_id smallint(5)  unsigned not null auto_increment primary key,
                     entity_type_code varchar(50) not null COLLATE utf8_general_ci,
                     entity_label varchar(255) not null COLLATE utf8_general_ci
                 )engine=innodb COLLATE utf8_general_ci;",
                $dbAdapter::QUERY_MODE_EXECUTE
            );
        }

        $result = $dbAdapter->query(
            "SELECT table_name FROM information_schema.tables WHERE table_schema = 'test' AND table_name = 'product_entity'",
            $dbAdapter::QUERY_MODE_EXECUTE
        );
        $count = $result->count();
        if($count == 0) {
            $result = $dbAdapter->query(
                "create table product_entity(
                     entity_id int unsigned not null auto_increment primary key,
                     entity_type_id smallint(8) not null,
                     product_key varchar(64) not null COLLATE utf8_general_ci,
                     category_ids text COLLATE utf8_general_ci,
                     created_at datetime not null,
                     updated_at datetime not null
                 )engine=innodb COLLATE utf8_general_ci;",
                $dbAdapter::QUERY_MODE_EXECUTE
            );

           /* $table = new Ddl\createTable('product_entity');
            $table->addColumn(new Column\Integer('id', false));
            $table->addColumn(new Column\Varchar('name', 255, false, null));
            $table->addColumn(new Column\Text('description', null, true));
            $table->addColumn(new Column\Floating('price', 10, 5, true));
            $table->addColumn(new Column\Varchar('product_key', 50, false));
            $table->addConstraint(new Constraint\PrimaryKey('id'));
            $table->addConstraint(new Constraint\UniqueKey('product_key'));
            $dbAdapter->query(
                $sql->buildSqlString($table),
                $dbAdapter::QUERY_MODE_EXECUTE
            );*/
        }
        $result = $dbAdapter->query(
            "SELECT table_name FROM information_schema.tables WHERE table_schema = 'test' AND table_name = 'customer_entity'",
            $dbAdapter::QUERY_MODE_EXECUTE
        );
        $count = $result->count();
        if($count == 0) {
            $result = $dbAdapter->query(
                "create table customer_entity(
                     entity_id int(10)  unsigned not null auto_increment primary key,
                     entity_type_id SMALLINT(8) not null,
                     email varchar(255) not null COLLATE utf8_general_ci,
                     created_at datetime not null,
                     updated_at datetime not null,
                     is_active tinyint(1) not null
                 )engine=innodb COLLATE utf8_general_ci;",
                $dbAdapter::QUERY_MODE_EXECUTE
            );
        }
        // creating category_entity table
        $result = $dbAdapter->query(
            "SELECT table_name FROM information_schema.tables WHERE table_schema = 'test' AND table_name = 'category_entity'",
            $dbAdapter::QUERY_MODE_EXECUTE
        );
        $count = $result->count();
        if($count == 0) {
            $result = $dbAdapter->query(
                "create table category_entity(
                     entity_id int(10)  unsigned not null auto_increment primary key,
                     entity_type_id SMALLINT(8) not null,
                     parent_id int(10) not null,
                     created_at datetime not null,
                     updated_at datetime not null,
                     path varchar(255) not null,
                     level int(11) not null,
                     children_count int(11) not null
                 )engine=innodb COLLATE utf8_general_ci;",
                $dbAdapter::QUERY_MODE_EXECUTE
            );
        }

        // creating product_attribute table
        $result = $dbAdapter->query(
            "SELECT table_name FROM information_schema.tables WHERE table_schema = 'test' AND table_name = 'eav_attribute'",
            $dbAdapter::QUERY_MODE_EXECUTE
        );
        $count = $result->count();
        if($count == 0) {
            $result = $dbAdapter->query(
                "create table eav_attribute(
                    attribute_id SMALLINT unsigned not null auto_increment primary key,
                    entity_id int unsigned not null comment 'unique key along with entity_type_id to determine entity',
                    entity_type_id int unsigned not null,
                    attribute_code VARCHAR(255) not NULL COLLATE utf8_general_ci,
                    backend_type enum('datetime','float','int','text','varchar') not null,
                    backend_table VARCHAR(255) COLLATE utf8_general_ci,
                    frontend_input varchar(50),
                    frontend_label varchar(255) COLLATE utf8_general_ci,
                    is_visible tinyint(1) not null,
                    is_required tinyint(1) not null,
                    default_value text COLLATE utf8_general_ci,
                    is_searchable tinyint(1) not null,
                    is_filterable tinyint(1) not null,
                    is_comparable tinyint(1) not null,
                    is_visible_on_front tinyint(1) not null,
                    is_unique tinyint(1) not null,
                    used_in_product_listing tinyint(1) not null,
                    used_for_sort_by tinyint(1) not null,
                    note VARCHAR(255) not null COLLATE utf8_general_ci,
                    is_visible_in_advanced_search tinyint(1) not null,
                    UNIQUE KEY (entity_id, entity_type_id)
                 )engine=innodb COLLATE utf8_general_ci;",
                $dbAdapter::QUERY_MODE_EXECUTE
            );
        }
        // creating eav_attribute_value_datetime table
        $result = $dbAdapter->query(
            "SELECT table_name FROM information_schema.tables WHERE table_schema = 'test' AND table_name = 'eav_attribute_value_datetime'",
            $dbAdapter::QUERY_MODE_EXECUTE
        );
        $count = $result->count();
        if($count == 0) {
            $result = $dbAdapter->query(
                "create table eav_attribute_value_datetime(
                     value_id int unsigned not null auto_increment primary key,
                     entity_id int(10)  unsigned not null,
                     entity_type_id SMALLINT(8) not null,
                     attribute_id SMALLINT(8) not null,
                     value datetime not null,
                     UNIQUE KEY (entity_id, entity_type_id, attribute_id)
                 )engine=innodb COLLATE utf8_general_ci;",
                $dbAdapter::QUERY_MODE_EXECUTE
            );
        }
        // creating eav_attribute_value_float table
        $result = $dbAdapter->query(
            "SELECT table_name FROM information_schema.tables WHERE table_schema = 'test' AND table_name = 'eav_attribute_value_float'",
            $dbAdapter::QUERY_MODE_EXECUTE
        );
        $count = $result->count();
        if($count == 0) {
            $result = $dbAdapter->query(
                "create table eav_attribute_value_float(
                     value_id int unsigned not null auto_increment primary key,
                     entity_id int(10)  unsigned not null,
                     entity_type_id SMALLINT(8) not null,
                     attribute_id SMALLINT(8) not null,
                     value float(12,4) not null,
                     UNIQUE KEY (entity_id, entity_type_id, attribute_id)
                 )engine=innodb COLLATE utf8_general_ci;",
                $dbAdapter::QUERY_MODE_EXECUTE
            );
        }
        // creating eav_attribute_value_int table
        $result = $dbAdapter->query(
            "SELECT table_name FROM information_schema.tables WHERE table_schema = 'test' AND table_name = 'eav_attribute_value_int'",
            $dbAdapter::QUERY_MODE_EXECUTE
        );
        $count = $result->count();
        if($count == 0) {
            $result = $dbAdapter->query(
                "create table eav_attribute_value_int(
                     value_id int unsigned not null auto_increment primary key,
                     entity_id int(10)  unsigned not null,
                     entity_type_id SMALLINT(8) not null,
                     attribute_id SMALLINT(8) not null,
                     value int(11) not null,
                     UNIQUE KEY (entity_id, entity_type_id, attribute_id)
                 )engine=innodb COLLATE utf8_general_ci;",
                $dbAdapter::QUERY_MODE_EXECUTE
            );
        }
        // creating eav_attribute_value_text table
        $result = $dbAdapter->query(
            "SELECT table_name FROM information_schema.tables WHERE table_schema = 'test' AND table_name = 'eav_attribute_value_text'",
            $dbAdapter::QUERY_MODE_EXECUTE
        );
        $count = $result->count();
        if($count == 0) {
            $result = $dbAdapter->query(
                "create table eav_attribute_value_text(
                     value_id int unsigned not null auto_increment primary key,
                     entity_id int(10)  unsigned not null,
                     entity_type_id SMALLINT(8) not null,
                     attribute_id SMALLINT(8) not null,
                     value text not null,
                     UNIQUE KEY (entity_id, entity_type_id, attribute_id)
                 )engine=innodb COLLATE utf8_general_ci;",
                $dbAdapter::QUERY_MODE_EXECUTE
            );
        }
        // creating eav_attribute_value_varchar table
        $result = $dbAdapter->query(
            "SELECT table_name FROM information_schema.tables WHERE table_schema = 'test' AND table_name = 'eav_attribute_value_varchar'",
            $dbAdapter::QUERY_MODE_EXECUTE
        );
        $count = $result->count();
        if($count == 0) {
            $result = $dbAdapter->query(
                "create table eav_attribute_value_varchar(
                     value_id int unsigned not null auto_increment primary key,
                     entity_id int(10)  unsigned not null,
                     entity_type_id SMALLINT(8) not null,
                     attribute_id SMALLINT(8) not null,
                     value varchar(255) not null,
                     UNIQUE KEY (entity_id, entity_type_id, attribute_id)
                 )engine=innodb COLLATE utf8_general_ci;",
                $dbAdapter::QUERY_MODE_EXECUTE
            );
        }
        // creating user table
        $result = $dbAdapter->query(
            "SELECT table_name FROM information_schema.tables WHERE table_schema = 'test' AND table_name = 'user'",
            $dbAdapter::QUERY_MODE_EXECUTE
        );
        $count = $result->count();
        if($count == 0) {
            $result = $dbAdapter->query(
                "create table user(
                     user_id int unsigned not null auto_increment primary key,
                     email varchar(200) not null COLLATE utf8_general_ci,
                     password varchar(45) not null COLLATE utf8_general_ci,
                     is_active tinyint(1) default 0,
                     UNIQUE KEY (email)
                 )engine=innodb COLLATE utf8_general_ci;",
                $dbAdapter::QUERY_MODE_EXECUTE
            );
        }

    }
    public function down()
    {
        /*$dbAdapterConfig = array(
            'driver'   => 'Mysqli',
            'database' => 'test',
            'username' => 'root',
            'password' => '',
            'charset'  => 'utf8'
        );
        $dbAdapter = new Adapter($dbAdapterConfig);
        $sql = new Sql($dbAdapter);
        $drop = new Ddl\DropTable('product_entity');
        $dbAdapter->query(
            $sql->buildSqlString($drop),
            $dbAdapter::QUERY_MODE_EXECUTE
        );*/
    }
}