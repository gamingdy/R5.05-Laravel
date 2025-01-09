<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up (): void {
        Schema::table('eleves', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('modules', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('evaluations', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('evaluation_eleves', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down (): void {
        Schema::table('eleves', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('modules', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('evaluations', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('evaluation_eleves', function (Blueprint $table) {
            $table->timestamps();
        });
    }
};
