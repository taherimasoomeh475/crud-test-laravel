<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('Firstname');
            $table->string('Lastname');
            $table->string('DateOfBirth');
            $table->string('PhoneNumber')->unique();
            $table->string('Email')->unique();
            $table->string('BankAccountNumber');
            $table->timestamps();
        });


        DB::statement('ALTER TABLE customer ADD CONSTRAINT  norepeat UNIQUE (Firstname,Lastname,DateOfBirth)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
