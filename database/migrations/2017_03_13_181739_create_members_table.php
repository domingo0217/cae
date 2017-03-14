<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id', 11);
            $table->string('name', 30);
            $table->string('lastname', 30);
            $table->string('nationality', 20);
            $table->date('birthdate');
            $table->enum('civil_status', array('soltero', 'casado', 'divorciado' ,'viudo'));
            $table->string('email', 50)->unique();
            $table->integer('telephone_id');
            $table->integer('address_id');
            $table->primary('id');
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
        Schema::dropIfExists('members');
    }
}