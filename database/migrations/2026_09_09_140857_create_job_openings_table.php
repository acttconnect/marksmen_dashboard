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
        Schema::create('job_openings', function (Blueprint $table) {
            $table->id();
             $table->string('title');

        $table->string('department');

        $table->string('employment_type');

        $table->string('location');

        $table->string('experience');

        $table->unsignedInteger('open_positions');

        $table->longText('job_description');

        $table->json('skills')
            ->nullable();

        $table->string('qualification')
            ->nullable();

        $table->longText('responsibilities')
            ->nullable();

        $table->longText('requirements')
            ->nullable();

        $table->enum('status', [
            'open',
            'closed',
            'draft'
        ])->default('draft');

        $table->date('application_deadline')
            ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_openings');
    }
};
