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
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('father_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->date('birth_date');
            $table->string('nid');
            $table->string('profession');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->integer('marital_status')->comment('married=1,unmarried=0');
            $table->text('visited_places');
            $table->string('image');
            $table->integer('is_admin')->default(0)->comment('is_admin=1, is_guide=2, is_user=0');
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
