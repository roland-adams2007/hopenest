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
        Schema::create('dontations', function (Blueprint $table) {
            $table->id();
            $table->string('refno');
            $table->string('donor_name');
            $table->string('email');
            $table->float('amount');
            $table->enum('status',['completed','pending','failed'])->default('pending');
            $table->timestamp('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dontations');
    }
};
