<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('customer')->nullable();
            $table->string('loan_number')->nullable();
            $table->date('date_distributed')->nullable();
            $table->string('loan_type')->nullable();
            $table->double('principle')->nullable();
            $table->double('bf')->nullable();
            $table->double('t_interest')->nullable();
            $table->double('fees')->nullable();
            $table->double('receipts')->nullable();
            $table->double('balance')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
