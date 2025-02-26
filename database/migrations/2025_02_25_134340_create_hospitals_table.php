<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id('hos_id')->collation('utf8mb4_general_ci');
            $table->string('name',50)->collation('utf8mb4_general_ci');
            $table->string('zip_code',15)->collation('utf8mb4_general_ci');
            $table->string('region',50)->collation('utf8mb4_general_ci');
            $table->string('national_pro_id',50)->collation('utf8mb4_general_ci');
            $table->enum('active',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->string('hos_insertby',40)->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE hospitals COLLATE utf8mb4_general_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
