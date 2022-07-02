 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Materia;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('tipo_documento');
            $table->string('numero_documento');
            $table->string('email');
            $table->string('telefono')->nullable();
            $table->string('telefono_emer')->nullable();
            $table->string('direccion')->nullable();
            $table->string('semestre')->nullable();
            $table->boolean('discapacidad')->nullable();
            $table->string('tipo_discapacidad')->nullable();
            $table->boolean('militar')->nullable();
            $table->boolean('cambio_carrera')->nullable();
            $table->boolean('cambio_turno')->nullable();
            $table->boolean('cambio_nucleo')->nullable();
            $table->boolean('embarazo')->nullable();
            $table->boolean('siceu')->nullable();
            $table->string('meses_em')->nullable();
            $table->string('sexo')->nullable();
            $table->string('ingreso')->nullable();
            $table->string('periodo_actual')->nullable();
            $table->date('fecha_na')->nullable();
            $table->text('observacion')->nullable();
            $table->string('status')->nullable();
            $table->boolean('delegado')->nullable();
            $table->string('tipo_delegado')->nullable();
            $table->string('seccion')->nullable();
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
        Schema::dropIfExists('students');
    }
};
