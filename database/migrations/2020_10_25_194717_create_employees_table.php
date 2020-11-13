<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('password')->nullable();
            $table->string('mobile', 13)->unique()->nullable();
            $table->string('PersonnelCode', 10)->unique();
            $table->string('email')->nullable();
            $table->string('position');
            $table->boolean('isAdmin')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('dateBirth')->nullable();
            $table->string('user_code',6)->nullable();
            $table->string('ip')->nullable();
            $table->unsignedBigInteger('organization_id');

            $table->timestamps();

            $table->foreign('organization_id')
                ->references('id')
                ->on('Organizations')
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
        Schema::dropIfExists('employees');
    }
}
