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
        Schema::create('equipment_groups', function (Blueprint $table) {
            $table->id('eqg_id');
            $table->string('eqg_name',100)->collation('utf8mb4_general_ci');
            $table->enum('eqg_active',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->string('eqg_insertby',40)->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE equipment_groups COLLATE utf8mb4_general_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_groups');
    }
};
