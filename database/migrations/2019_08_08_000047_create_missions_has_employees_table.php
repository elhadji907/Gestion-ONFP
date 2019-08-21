<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionsHasEmployeesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'missions_has_employees';

    /**
     * Run the migrations.
     * @table missions_has_employees
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('missions_id');
            $table->unsignedInteger('employees_id');

            $table->index(["missions_id"], 'fk_missions_has_employees_missions1_idx');

            $table->index(["employees_id"], 'fk_missions_has_employees_employees1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('missions_id', 'fk_missions_has_employees_missions1_idx')
                ->references('id')->on('missions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('employees_id', 'fk_missions_has_employees_employees1_idx')
                ->references('id')->on('employees')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
