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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name')->unique(); // Server name
            $table->string('host'); // Server IP or hostname
            $table->string('ssh_username'); // SSH username
            $table->string('pem_file')->nullable(); // Path to PEM file
            $table->string('git_username')->nullable(); // Git username
            $table->text('git_password')->nullable(); // Git password (encrypted)
            $table->enum('status', ['active', 'inactive'])->default('active'); // Server status
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
