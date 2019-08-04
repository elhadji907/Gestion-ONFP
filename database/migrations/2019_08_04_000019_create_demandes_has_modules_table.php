<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandesHasModulesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'demandes_has_modules';

    /**
     * Run the migrations.
     * @table demandes_has_modules
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('demandes_id');
            $table->unsignedInteger('modules_id');

            $table->index(["demandes_id"], 'fk_demandes_has_modules_demandes1_idx');

            $table->index(["modules_id"], 'fk_demandes_has_modules_modules1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('demandes_id', 'fk_demandes_has_modules_demandes1_idx')
                ->references('id')->on('demandes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('modules_id', 'fk_demandes_has_modules_modules1_idx')
                ->references('id')->on('modules')
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
