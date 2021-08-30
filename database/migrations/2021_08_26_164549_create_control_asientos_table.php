<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlAsientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_asientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained();
            $table->foreignId('categoria_id')->constrained();
            #$table->string('descripcion', 50);
            #$table->integer('cantidad');
            #$table->decimal('precio', 10, 2);
            $table->decimal('total', 10, 2);
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
        Schema::dropIfExists('control_asientos');
    }
}
