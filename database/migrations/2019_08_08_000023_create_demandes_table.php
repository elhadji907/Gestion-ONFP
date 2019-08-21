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
            $table->string('domaine', 200)->nullable();
            $table->string('module', 200)->nullable();
            $table->string('situation_professionnelle', 200)->nullable();
            $table->string('institution', 200)->nullable();
            $table->string('niveau_etude', 200)->nullable();
            $table->string('diplome', 200)->nullable();
            $table->string('qualification', 200)->nullable();
            $table->string('experience', 200)->nullable();
            $table->char('deja_forme', 3)->nullable();
            $table->string('pre_requis', 200)->nullable();
            $table->string('projet', 200)->nullable();
            $table->unsignedInteger('lieux_id');
            $table->unsignedInteger('users_id');

            $table->index(["lieux_id"], 'fk_demandes_lieux1_idx');

            $table->index(["users_id"], 'fk_demandes_users1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('lieux_id', 'fk_demandes_lieux1_idx')
                ->references('id')->on('lieux')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_demandes_users1_idx')
                ->references('id')->on('users')
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
