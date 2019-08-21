<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesHasFormationPersonnelsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employees_has_formation_personnels';

    /**
     * Run the migrations.
     * @table employees_has_formation_personnels
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('employees_id');
            $table->unsignedInteger('formation_personnels_id');

            $table->index(["employees_id"], 'fk_employees_has_formation_personnels_employees1_idx');

            $table->index(["formation_personnels_id"], 'fk_employees_has_formation_personnels_formation_personnels1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('employees_id', 'fk_employees_has_formation_personnels_employees1_idx')
                ->references('id')->on('employees')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('formation_personnels_id', 'fk_employees_has_formation_personnels_formation_personnels1_idx')
                ->references('id')->on('formation_personnels')
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
