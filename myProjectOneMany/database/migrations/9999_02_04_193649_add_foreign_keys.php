<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('tasks', function (Blueprint $table) {

        $table -> foreign('employee_id', 'task-employee')
               -> references('id')
               -> on('employees');

      });

      Schema::table('task_typology', function (Blueprint $table) {

        $table -> foreign('task_id', 'el-task')
               -> references('id')
               -> on('tasks');

        $table -> foreign('typology_id', 'el-typology')
               -> references('id')
               -> on('typologies');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('tasks', function (Blueprint $table) {

        $table -> dropForeign('task-employee');

      });

      Schema::table('task_typology', function (Blueprint $table) {

        $table -> dropForeign('el-typology');
        $table -> dropForeign('el-task');

      });

    }
}
