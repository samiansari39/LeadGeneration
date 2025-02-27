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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id('sp_id');
            $table->unsignedBigInteger('sp_type')->collation('utf8mb4_general_ci');
            $table->string('sp_manufacturer',100)->collation('utf8mb4_general_ci');
            $table->string('sp_name',100)->collation('utf8mb4_general_ci');
            $table->string('sp_lotno',50)->collation('utf8mb4_general_ci');
            $table->date('sp_expdate')->collation('utf8mb4_general_ci');
            $table->string('sp_billingcode',50)->collation('utf8mb4_general_ci');
            $table->text('sp_notes')->collation('utf8mb4_general_ci');
            $table->enum('sp_active',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->enum('sp_groups',['0', '1'])->default('0')->collation('utf8mb4_general_ci');
            $table->string('sp_insertby',40)->collation('utf8mb4_general_ci');
            $table->enum('close', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->enum('status', ['0', '1'])->default('1')->collation('utf8mb4_general_ci');
            $table->timestamps();
            $table->foreign('sp_type')
            ->references('spg_id')
            ->on('supply_groups')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
        DB::statement("ALTER TABLE supplies COLLATE utf8mb4_general_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};
