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
        Schema::create('hostels', function (Blueprint $table) {
            $table->id();
            $table->string('hostel_name', 45)->notNull();
            $table->string('hostel_image_path', 100)->notNull();
            $table->string('hostel_location', 45)->notNull();
            $table->string('hostel_description', 255)->notNull();
            $table->integer('no_of_rooms')->notNull();
            $table->double('room_price')->notNull();
            $table->unsignedBigInteger('owner_id');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('admins')->onDelete('restrict');

            $table->index('owner_id', 'hostel_owner_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hostels');
    }
};
