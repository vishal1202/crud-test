<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToMaterialsTable extends Migration
{
    public function up()
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Drop the column if rolling back
        });
    }
}
