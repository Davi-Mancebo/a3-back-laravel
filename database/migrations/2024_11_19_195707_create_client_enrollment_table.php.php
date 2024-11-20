<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientEnrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_enrollment', function (Blueprint $table) {
            $table->id(); // Cria a chave primária como 'id'
            
            // Chaves estrangeiras
            $table->unsignedBigInteger('student_id'); // Relaciona-se com o id da tabela 'users' (aluno)
            $table->unsignedBigInteger('professor_id'); // Relaciona-se com o id da tabela 'users' (professor)
            $table->unsignedBigInteger('client_id'); // Relaciona-se com o id da tabela 'clients'

            // Campos adicionais
            $table->text('familiar_historic')->nullable();
            $table->text('social_historic')->nullable();
            $table->timestamps(); // Cria os campos 'created_at' e 'updated_at'
            $table->boolean('is_active')->default(true); // Marca se a matrícula está ativa

            // Restrições de chave estrangeira
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('professor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_enrollment');
    }
}
