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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->nullable()->constrained('flights')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('service', ['flight', 'tour', 'ticket']);
            $table->string('client_name');
            $table->string('client_mobile');
            $table->string('client_email');
            $table->string('client_passport_number');
            $table->integer('number_of_adult');
            $table->integer('number_of_children');
            $table->integer('number_of_babies');
            $table->string('nationality');
            $table->foreignId('depature_country_id')->nullable()->constrained('countries')->cascadeOnDelete();
            $table->date('depature_date');
            $table->date('return_date');
            //////////////////////////////////////////////////////////////////////////////////////////////////////
            $table->foreignId('ticket_id')->nullable()->constrained('flight_tickets')->cascadeOnDelete();
            // $table->integer('from_country_id')->nullable();
            // $table->integer('from_city_id')->nullable();
            // $table->integer('to_country_id')->nullable();
            // $table->integer('to_city_id')->nullable();
            $table->string('economy_class_name');
            $table->enum('economy_class_type', ['direct_flight', 'transit']);
            //////////////////////////////////////////////////////////////////////////////////////////////////////
            $table->longText('notes');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
