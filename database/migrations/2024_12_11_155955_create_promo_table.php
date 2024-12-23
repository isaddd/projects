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
        Schema::create('promo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('promo_code')->nullable();
            $table->string('nominal_diskon')->nullable();
            $table->string('jumlah_promo')->nullable();
            $table->boolean('promo_terbatas');
            $table->boolean('promo_tersedia');
            $table->dateTime('expiry_date');
            $table->string('status_promo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo');
    }
};
