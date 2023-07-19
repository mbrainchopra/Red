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
        Schema::create('gtasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->time('time');
            $table->date('date');
            $table->string('taskname');
            $table->string('uemail');
            $table->string('members');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gtasks');
    }
};
