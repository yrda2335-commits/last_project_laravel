<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_training', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('training_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('status', [
                'enrolled',
                'completed',
                'cancelled'
            ])->default('enrolled');

            $table->timestamps();

            $table->unique(['employee_id', 'training_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_training');
    }
};