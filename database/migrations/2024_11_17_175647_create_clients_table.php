<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // Cria a chave primária como 'client_id'
            $table->string('name');
            $table->string('cellphone')->nullable();
            $table->timestamp('date_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable();
            $table->string('SOS_phone')->nullable();
            $table->string('scholarship')->nullable();
            $table->string('work')->nullable();
            $table->enum('special_cases', ['case1', 'case2', 'case3'])->nullable(); // Ajuste conforme os casos do ENUM
            $table->timestamps(); // Cria os campos 'created_at' e 'updated_at' automaticamente
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
