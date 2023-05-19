<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_services', function (Blueprint $table) {
            $table->foreignId('employee_id')
            ->constrained('employees')
            ->onDelete('cascade');
            $table->foreignId('service_id')
            ->constrained('services')
            ->onDelete('cascade');
            $table->integer('duration')->default(10);
            $table->primary(['employee_id','service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_services');
    }
};
