<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'demandes';

    /**
     * Run the migrations.
     * @table demandes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('name', 200)->nullable();
            $table->unsignedInteger('lieux_id');

            $table->index(["lieux_id"], 'fk_demandes_lieux1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('lieux_id', 'fk_demandes_lieux1_idx')
                ->references('id')->on('lieux')
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
