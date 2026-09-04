<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->foreignId('department_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');
            $table->text('description')->nullable();

            $table->enum('status', [
                'planning',
                'active',
                'completed',
                'cancelled'
            ])->default('planning');

            $table->enum('priority', [
                'low',
                'medium',
                'high'
            ])->default('medium');

            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();

            $table->timestamps();

            $table->index('status');
            $table->index('priority');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};