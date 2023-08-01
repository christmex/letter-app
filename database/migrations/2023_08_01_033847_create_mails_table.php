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
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('mail_number');
            $table->date('mail_date');
            $table->foreignId('letter_category_id')->constrained();
            $table->string('mail_sender');
            $table->string('mail_subject');
            $table->longText('mail_file')->nullable();
            $table->string('mail_addressed_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
