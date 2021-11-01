<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->text('license_certification');
            $table->string('license_type');
            $table->date('last_acquired')->nullable();
            $table->string('renewal')->nullable();
            $table->date('next_renewal')->nullable();
            $table->text('notes')->nullable();
            $table->text('license_key')->nullable();
            /** Asset Details** */
            $table->string('brandName')->nullable();
            $table->string('modelName')->nullable();
            $table->string('assetTag')->nullable();
            $table->string('asset_serial')->nullable();
            $table->string('notify')->nullable();
            $table->date('next_reminder')->nullable();
            $table->string('reminder')->nullable();
            $table->string('certificates')->nullable();
            $table->string('supplier')->nullable();
            $table->string('password')->nullable();
            $table->softDeletes();
            $table->foreignId('department_id')->nullable()->constrained('departments')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('licenses');
    }
}
