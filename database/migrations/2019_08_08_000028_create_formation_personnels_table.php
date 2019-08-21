<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationPersonnelsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'formation_personnels';

    /**
     * Run the migrations.
     * @table formation_personnels
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('numero', 200);
            $table->string('theme', 200);
            $table->string('name', 200);
            $table->string('periode', 200)->nullable();
            $table->dateTime('date_debut')->nullable();
            $table->dateTime('date_fin')->nullable();
            $table->string('cout', 200)->nullable();
            $table->string('lieu', 200)->nullable();
            $table->string('operateur', 200)->nullable();
            $table->string('statut', 200)->nullable();
            $table->string('observation', 200)->nullable();
            $table->unsignedInteger('gestionnaires_id');

            $table->index(["gestionnaires_id"], 'fk_personnel_formations_gestionnaires1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('gestionnaires_id', 'fk_personnel_formations_gestionnaires1_idx')
                ->references('id')->on('gestionnaires')
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
