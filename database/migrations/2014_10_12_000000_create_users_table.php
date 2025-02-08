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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->default('');
            $table->string('position')->default('');
            $table->string('website')->default('');
            $table->string('profile_pic')->default('');
            $table->string('cover_pic')->default('');
            $table->string('mobile_number')->default('');
            $table->string('telephone_number')->default('');
            $table->string('twitter_url')->default('');
            $table->string('insta_url')->default('');
            $table->string('snapchat_url')->default('');
            $table->string('linkedin_url')->default('');
            $table->string('fb_url')->default('');
            $table->string('address')->default('');
            $table->string('employee_level')->default('');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
