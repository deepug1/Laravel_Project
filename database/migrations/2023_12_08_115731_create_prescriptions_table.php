<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    // Schema::create('prescriptions', function (Blueprint $table) {
    //        $table->id();
    //       $table->string('name');
    //       $table->string('email')->nullable();
    //        $table->string('phone');
    //        $table->string('prescription_image');
    //          $table->timestamps();
    //      });
    // }
    public function up(): void
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id')->constrained();
            $table->string('prescription_image');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};


