<?php

use App\Models\Defunit;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('defsubtasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdfor(Defunit::class)
                    ->constrained()
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->string('description');
            $table->boolean('is_published');
            $table->foreignIdFor(User::class)
                    ->constrained()
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defsubtasks');
    }
};
