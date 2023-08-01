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
        Schema::create('incoming_mails', function (Blueprint $table) {
            $table->id();
            $table->string('incoming_mail_number');
            $table->date('incoming_mail_date');
            $table->foreignId('letter_category_id')->constrained();
            $table->string('incoming_mail_sender');
            $table->string('incoming_mail_subject');
            $table->longText('incoming_mail_file')->nullable();
            $table->string('incoming_mail_addressed_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_mails');
    }
};
