<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventsauceMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventsauce_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_id', 36);
            $table->string('event_type', 100);
            $table->string('aggregate_root_id', 36)->nullable()->index();
            $table->dateTime('time_of_recording', 6)->index();
            $table->text('payload');
        });
        // DB::statement("CREATE TABLE eventsauce_messages (
        //     event_id UUID NOT NULL,
        //     event_type VARCHAR(255) NOT NULL,
        //     aggregate_root_id UUID NULL,
        //     time_of_recording TIMESTAMP(0) WITH TIME ZONE NOT NULL,
        //     payload JSON NOT NULL,
        //     PRIMARY KEY(event_id)
        // )");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eventsauce_messages');
    }
}
