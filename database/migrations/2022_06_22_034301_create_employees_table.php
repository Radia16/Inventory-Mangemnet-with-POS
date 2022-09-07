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
            $table->bigInteger('department_id')->nullable();
            $table->string('employee_name');
            $table->string('email_id')->unique();
            $table->string('employee_ofc_id')->nullable();
            $table->string('emp_father_name')->nullable();
            $table->string('emp_mother_name')->nullable();
            $table->date('emp_dob')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('present_address')->nullable();
            $table->string('parmanent_address')->nullable();
            $table->string('emp_image')->nullable();
            $table->string('designation')->nullable();
            $table->integer('emp_salary')->nullable();
            $table->string('emp_phone')->nullable();
            $table->integer('emp_status')->default(1);

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
        Schema::dropIfExists('employees');
    }
}
