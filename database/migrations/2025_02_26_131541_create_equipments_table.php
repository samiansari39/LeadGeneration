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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id('eq_id');
            $table->unsignedBigInteger('eq_type')->collation('utf8mb4_general_ci');
            $table->string('eq_manufacturer',100)->collation('utf8mb4_general_ci');
            $table->string('eq_name',100)->collation('utf8mb4_general_ci');
            $table->string('eq_serial',50)->collation('utf8mb4_general_ci');
            $table->date('eq_lastservice')->collation('utf8mb4_general_ci');
            $table->date('eq_nextservice')->collation('utf8mb4_general_ci');
            $table->string('eq_billingcode',50)->collation('utf8mb4_general_ci');
            $table->text('eq_notes')->collation('utf8mb4_general_ci');
            $table->enum('eq_active',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->string('eq_insertby',40)->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
            $table->foreign('eq_type')
            ->references('eqg_id')
            ->on('equipment_groups')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
        DB::statement("ALTER TABLE equipments COLLATE utf8mb4_general_ci");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipments');
    }
};
