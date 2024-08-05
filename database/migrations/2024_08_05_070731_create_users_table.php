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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("email", 200)->unique("users_email_unique")->nullable(false);
            $table->String("username", 100)->unique()->nullable(false);
            $table->string("password")->nullable(false);
            $table->unsignedBigInteger("role_id")->nullable(false);
            $table->timestamps();

            $table->foreign("role_id")->references("id")->on("roles");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
