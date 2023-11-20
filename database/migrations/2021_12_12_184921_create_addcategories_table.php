<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('code');
            $table->string('image');
            $table->boolean('status');
            $table->foreignId('type_id')->constrained('addassets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addcategories');
    }
}
