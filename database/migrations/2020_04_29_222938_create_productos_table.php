<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('precio')->nullable();
            $table->string('description')->nullable();
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('vendidos')->default(0);
            $table->tinyInteger('nuevo')->unsigned()->default(0);
            $table->decimal('promedio', 8, 2)->nullable();
            $table->string('image');
            $table->timestamps();

            $table->unsignedInteger('categoria_id');
            $table->foreign('categoria_id')
                ->references('id')->on('categorias')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
