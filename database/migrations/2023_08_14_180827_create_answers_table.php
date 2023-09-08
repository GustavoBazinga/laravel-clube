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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            //Request foreign key
            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
            //Question foreign key
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            //Option foreign key
            $table->unsignedBigInteger('option_id')->nullable();
            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
            //Answer
            $table->string('answer')->nullable();


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
