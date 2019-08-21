<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperateursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'operateurs';

    /**
     * Run the migrations.
     * @table operateurs
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
            $table->string('sigle', 200)->nullable();
            $table->string('ninea', 200)->nullable();
            $table->string('numero_agrement', 200)->nullable();
            $table->unsignedInteger('administrateurs_id');
            $table->unsignedInteger('communes_id');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('institutions_id');

            $table->index(["institutions_id"], 'fk_operateurs_institutions1_idx');

            $table->index(["administrateurs_id"], 'fk_compteurs_administrateurs1_idx');

            $table->index(["communes_id"], 'fk_operateurs_communes1_idx');

            $table->index(["users_id"], 'fk_operateurs_users1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('administrateurs_id', 'fk_compteurs_administrateurs1_idx')
                ->references('id')->on('administrateurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('communes_id', 'fk_operateurs_communes1_idx')
                ->references('id')->on('communes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_operateurs_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('institutions_id', 'fk_operateurs_institutions1_idx')
                ->references('id')->on('institutions')
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
