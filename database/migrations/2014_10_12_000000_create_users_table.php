<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar_url')->nullable();
            $table->string('auth_type');
            $table->text('biography')->nullable();
            $table->date('birthday')->nullable();
            $table->boolean('composer')->default(false);
            $table->timestamp('email_verified_at')->default(now());
            $table->boolean('illustrator')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_banned')->default(false);
            $table->boolean('is_moderator')->default(false);
            $table->string('nickname')->nullable();
            $table->integer('number_follower')->default(0);
            $table->integer('number_like')->default(0);
            $table->string('password');
            $table->string('phone')->nullable();
            $table->decimal('proof_work_coin')->default(0);
            $table->integer('reputation')->default(0);
            $table->boolean('singer')->default(false);
            $table->boolean('translator')->default(false);
            $table->boolean('writer')->default(true);
            $table->boolean('legal_age')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
