<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainesHasDemandesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'domaines_has_demandes';

    /**
     * Run the migrations.
     * @table domaines_has_demandes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('domaines_id');
            $table->unsignedInteger('demandes_id');

            $table->index(["domaines_id"], 'fk_domaines_has_demandes_domaines1_idx');

            $table->index(["demandes_id"], 'fk_domaines_has_demandes_demandes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('domaines_id', 'fk_domaines_has_demandes_domaines1_idx')
                ->references('id')->on('domaines')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('demandes_id', 'fk_domaines_has_demandes_demandes1_idx')
                ->references('id')->on('demandes')
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
