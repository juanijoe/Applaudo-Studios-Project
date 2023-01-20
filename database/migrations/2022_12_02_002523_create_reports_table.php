<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('candidates')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('status_id')->constrained('statuses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('position_id')->constrained('positions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('candidate_email');
            $table->string('company_email');
            $table->text('observations');
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
        Schema::dropIfExists('reports');
    }
};
