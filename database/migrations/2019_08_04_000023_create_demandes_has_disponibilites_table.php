<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandesHasDisponibilitesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'demandes_has_disponibilites';

    /**
     * Run the migrations.
     * @table demandes_has_disponibilites
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('demandes_id');
            $table->unsignedInteger('disponibilites_id');

            $table->index(["disponibilites_id"], 'fk_demandes_has_disponibilites_disponibilites1_idx');

            $table->index(["demandes_id"], 'fk_demandes_has_disponibilites_demandes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('demandes_id', 'fk_demandes_has_disponibilites_demandes1_idx')
                ->references('id')->on('demandes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('disponibilites_id', 'fk_demandes_has_disponibilites_disponibilites1_idx')
                ->references('id')->on('disponibilites')
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
