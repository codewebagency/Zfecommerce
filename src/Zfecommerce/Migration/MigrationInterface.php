<?php

namespace Zfecommerce\Migration;

interface MigrationInterface
{
    public function up();
    public function down();
}