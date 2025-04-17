<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('scratch_cards', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->integer('value');
            $table->boolean('is_used')->default(false);
            $table->timestamps();
        });
    }

};
