<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name')->nullable();
            $table->integer('inter_row_padding')->nullable();
            $table->integer('top_frame_padding')->nullable();
            $table->integer('inter_col_padding')->nullable();
            $table->integer('custom_padding')->nullable();
            $table->integer('image_id')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->boolean('is_column_mirrored');
            $table->boolean('is_no_cut');
            $table->boolean('is_seasonal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
