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
        Schema::create('s_e_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('published_time')->nullable();
            $table->string('modified_time')->nullable();
            $table->string('author')->nullable();
            $table->string('canonical')->nullable();
            $table->string('og_locale')->nullable();
            $table->string('og_url')->nullable();
            $table->string('og_type')->nullable();
            $table->string('img')->nullable();
            $table->string('twitter_card')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('twitter_label')->nullable();
            $table->string('twitter_data')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_e_o_s');
    }
};
