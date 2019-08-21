<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'formations';

    /**
     * Run the migrations.
     * @table formations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->unsignedInteger('code');
            $table->string('name', 200)->nullable();
            $table->string('effectif_total', 200)->nullable();
            $table->dateTime('date_pv')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('date_debut')->nullable();
            $table->dateTime('date_fin')->nullable();
            $table->unsignedInteger('factures_id')->nullable();
            $table->unsignedInteger('agents_id');
            $table->unsignedInteger('detfs_id');
            $table->unsignedInteger('conventions_id');
            $table->unsignedInteger('demandes_id');
            $table->unsignedInteger('nivaux_id');
            $table->unsignedInteger('programmes_id')->nullable();

            $table->index(["agents_id"], 'fk_consommations_agents1_idx');

            $table->index(["conventions_id"], 'fk_formations_conventions1_idx');

            $table->index(["nivaux_id"], 'fk_formations_nivaux1_idx');

            $table->index(["programmes_id"], 'fk_formations_programmes1_idx');

            $table->index(["demandes_id"], 'fk_formations_demandes1_idx');

            $table->index(["factures_id"], 'fk_consommations_factures1_idx');

            $table->index(["detfs_id"], 'fk_formations_detfs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('factures_id', 'fk_consommations_factures1_idx')
                ->references('id')->on('factures')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('agents_id', 'fk_consommations_agents1_idx')
                ->references('id')->on('agents')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('detfs_id', 'fk_formations_detfs1_idx')
                ->references('id')->on('detfs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('conventions_id', 'fk_formations_conventions1_idx')
                ->references('id')->on('conventions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('demandes_id', 'fk_formations_demandes1_idx')
                ->references('id')->on('demandes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('nivaux_id', 'fk_formations_nivaux1_idx')
                ->references('id')->on('niveaux')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('programmes_id', 'fk_formations_programmes1_idx')
                ->references('id')->on('programmes')
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
