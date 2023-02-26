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
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->bigInteger('admin_id')->unsigned();
            $table->bigInteger('role_id')->unsigned();

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->primary(['admin_id', 'role_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_roles');
    }
};
