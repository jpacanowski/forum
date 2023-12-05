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
        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(false)->unsigned();
            $table->foreignId('category_id')->nullable(false)->unsigned();
            $table->string('subject', 255)->nullable(false);
            $table->string('slug')->nullable(false)->unique();
            $table->enum('status', ['OPEN', 'CLOSED'])->default('OPEN');
            //$table->dateTime('last_post_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('threads');
    }
};
