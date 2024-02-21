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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('url')->default('https://web.facebook.com/dinhtuanbut');
            $table->string('background_url')->default('https://scontent.fhan5-7.fna.fbcdn.net/v/t1.6435-9/53709924_108481083650731_8086151347839172608_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=2be8e3&_nc_eui2=AeFuQXkqMhIdY7DFQja3qlyjN0_L4V4oS183T8vhXihLX-J_PfGKl0uaCRmhqh88k3t-OB4aTEIOZq_WlUGvER0g&_nc_ohc=uGuE8QKN860AX_4y4En&_nc_ht=scontent.fhan5-7.fna&oh=00_AfCxgaTa6XPmgmFVizTk6A50w0oGe0RZrXS01q1t36awcg&oe=658FC0D4');
            $table->date('birth');
            $table->string('number_phone')->unique()->default(NULL);
            $table->boolean('confirm');
            $table->string('confirmation_code')->default(NULL);
            $table->dateTime('confirmation_code_expired_in')->default(NULL);
            $table->string('password');
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