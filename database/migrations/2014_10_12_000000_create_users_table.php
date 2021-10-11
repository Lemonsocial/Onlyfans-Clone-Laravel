<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('display_name')->unique()->nullable();
            $table->string('subscription_price')->nullable();
            $table->text('location')->nullable();
            $table->text('about')->nullable();
            $table->string('website_url')->nullable();
            $table->string('amazon_wishlist')->nullable();
            $table->string('email')->unique();
            $table->boolean('email_notifications')->default(false);
            $table->boolean('browser_push_notifications')->default(false);
            $table->string('telegram_bot_link')->nullable();
            $table->string('spotify_link')->nullable();
            $table->json('site_security_settings');
            $table->json('site_notification_settings');
            $table->json('site_toast_settings');
            $table->json('site_privacy_settings');        
            $table->json('personal_settings');                      
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('google_id')->nullable();

            /* First attempt will use an identity verification service */
            $table->json('identification');  
            $table->dateTime('birthdate')->nullable();
            $table->boolean('is_majority')->default(false);
            $table->boolean('admin_verified')->default(false);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->text('background_photo_path')->nullable();
            $table->text('stripe_account_id')->nullable();
            $table->boolean('stripe_verified')->default(false);
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
}
