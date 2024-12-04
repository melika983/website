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
        Schema::create('rewards_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->bit('is_used');
            $table->timestamps('random_dt');
            $table->integer('reward_id');
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
            $table->bit('is_emergency');

         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewards_details');
    }
};
