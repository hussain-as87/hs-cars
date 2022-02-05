<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_features', function (Blueprint $table) {
            $table->foreignId('car_id')->constrained('users','id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('air_conditions',[0,1]);
            $table->enum('child_seat',[0,1]);
            $table->enum('gps',[0,1]);
            $table->enum('luggage',[0,1]);
            $table->enum('music',[0,1]);
            $table->enum('seat_beit',[0,1]);
            $table->enum('sleeping_bed',[0,1]);
            $table->enum('water',[0,1]);
            $table->enum('bluetooth',[0,1]);
            $table->enum('onboard_computer',[0,1]);
            $table->enum('audio_input',[0,1]);
            $table->enum('long_term_trips',[0,1]);
            $table->enum('car_kit',[0,1]);
            $table->enum('remote_central_locking',[0,1]);
            $table->enum('climate_control',[0,1]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_features');
    }
}
