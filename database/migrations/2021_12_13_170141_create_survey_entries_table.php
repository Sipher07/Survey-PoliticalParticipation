<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_entries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->char('gender')->nullable();
            $table->string('barangay')->nullable();

            $table->float('C1')->nullable();
            $table->float('C2')->nullable();
            $table->float('C3')->nullable();
            $table->float('C4')->nullable();
            $table->float('C5')->nullable();
            $table->float('C6')->nullable();
            $table->float('C7')->nullable();
            $table->float('C_Score')->nullable();

            $table->float('UC1')->nullable();
            $table->float('UC2')->nullable();
            $table->float('UC3')->nullable();
            $table->float('UC4')->nullable();
            $table->float('UC5')->nullable();
            $table->float('UC6')->nullable();
            $table->float('UC_Score')->nullable();

            $table->float('KS1')->nullable();
            $table->float('KS2')->nullable();
            $table->float('KS3')->nullable();
            $table->float('KS_Score')->nullable();

            $table->float('IP1')->nullable();
            $table->float('IP2')->nullable();
            $table->float('IP_Score')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_entries_tabl');
    }
}
