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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('ownership');
            $table->string('tin')->unique();
            $table->string('bin')->nullable();
            $table->integer('year_of_registration');
            $table->integer('years_in_operation');
            $table->text('address');
            $table->string('website')->nullable();
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_phone');

            $table->string('trade_license_path');
            $table->string('tin_pdf_path');
            $table->string('bin_pdf_path')->nullable();
            $table->string('certificate_of_incorporation_path')->nullable();

            // Foreign key constraint linking to users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
