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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('check_in')->notNull();
            $table->date('check_out')->notNull();
            $table->integer('no_of_rooms')->notNull();
            $table->string('status', 45)->default('pending');
            $table->unsignedBigInteger('hostel_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('hostel_id')->references('id')->on('hostels')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->index('hostel_id', 'booked_hostel_idx');
            $table->index('user_id', 'booked_by_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
