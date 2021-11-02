<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_logs', function (Blueprint $table) {
            $table->id();
            $table->boolean('near_expiry')->default(0);
            $table->boolean('expired')->default(0);
            $table->boolean('reminder')->default(0);
            $table->date('near_expiry_date')->nullable();
            $table->date('expired_date')->nullable();
            $table->date('reminder_date')->nullable();
            $table->foreignId('license_id')->constrained('licenses')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('email_logs');
    }
}
