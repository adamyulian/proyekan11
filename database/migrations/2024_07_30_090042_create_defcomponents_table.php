<?php

use App\Models\User;
use App\Models\Defunit;
use App\Models\Defbrand;
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
        Schema::create('defcomponents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->float('price');
            $table->text('description');
            $table->foreignIdfor(Defunit::class)
                    ->constrained()
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->foreignIdfor(Defbrand::class)
                    ->constrained()
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->foreignIdFor(User::class)
                    ->constrained()
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->boolean('is_published');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defcomponents');
    }
};
