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
        Schema::create('rewards', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('description');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->timestamp('start_dt');
            $table->timestamp('end_dt');
            $table->integer('total');
            $table->integer('total_emergency');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewards');
    }
};
