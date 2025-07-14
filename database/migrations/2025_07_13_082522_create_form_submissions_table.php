<?php

// database/migrations/xxxx_xx_xx_create_form_submissions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            $table->timestampsTz();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('ni_number');
            $table->string('utr_number');
            $table->string('reason');
            $table->string('brp_front_url')->nullable();
            $table->string('brp_front_json')->nullable();
            $table->string('brp_back_url')->nullable();
            $table->string('brp_back_json')->nullable();
            $table->string('bank_statement_url')->nullable();
            $table->string('bank_statement_json')->nullable();
            $table->string('receipts_url')->nullable();
            $table->string('receipts_json')->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('form_submissions');
    }
};
