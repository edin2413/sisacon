<?php

use App\Models\ControlAsiento;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleAsientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_asientos', function (Blueprint $table) {
            $table->id();
            #$table->foreign('controlasiento_id')->references('id')->on('control_asiento');
            $table->foreignId('controlasiento_id')->constrained('control_asientos');
            $table->string('descripcion_detalle', 50);
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2);
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
        Schema::dropIfExists('detalle_asientos');
    }
}
