<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('my_feedbacks', function (Blueprint $table) {
            Schema::create('my_feedbacks', function (Blueprint $table) {
                $table->id();
                $table->string('sender_name');
                $table->string('sender_email');
                $table->text('message');
                $table->integer('rating');
                $table->timestamps();
            });

            DB::statement('ALTER TABLE my_feedbacks ADD CONSTRAINT chk_rating CHECK (rating BETWEEN 1 AND 5)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_feedbacks');
    }
};