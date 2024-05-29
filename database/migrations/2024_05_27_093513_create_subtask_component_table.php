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
        Schema::create('subtask_component', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Subtask::class)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignIdFor(\App\Models\Component::class)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->float('coeff');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subtask_component');
    }
};
