<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cachets', function (Blueprint $table) {
            $table->id();
            //FK from worker
            $table->unsignedBigInteger('worker_id');
            $table->foreign('worker_id')->references('id')->on('workers');
            
            //FK from event
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');

            //FK from role
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');

            //start time and end time
            $table->timestamp('start_time');
            $table->timestamp('end_time');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cachets');
    }
};
