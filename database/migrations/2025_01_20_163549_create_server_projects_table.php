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
        Schema::create('server_projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('server_id');
            $table->string('name');
            $table->string('path'); // Example: /var/www/html/project1
            $table->string('branch')->default('main'); // Default branch for pulling
            $table->text('deploy_script')->nullable(); // Optional deploy script
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('server_id')->references('id')->on('servers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_projects');
    }
};
