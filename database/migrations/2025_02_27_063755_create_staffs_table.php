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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id('st_id');
            $table->string('st_name', 100)->collation('utf8mb4_general_ci');
            $table->string('st_first_name', 50)->collation('utf8mb4_general_ci');
            $table->string('st_middle_name', 50)->nullable()->collation('utf8mb4_general_ci');
            $table->string('st_last_name', 50)->collation('utf8mb4_general_ci');
            $table->string('st_phone', 20)->collation('utf8mb4_general_ci');
            $table->enum('anesthesiologist',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('cardiologist',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('crna',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('family_md',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('perfusionist',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('physician_assistant',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('surgeon',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('st_active',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->string('st_insertby',40)->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE staffs COLLATE utf8mb4_general_ci");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
