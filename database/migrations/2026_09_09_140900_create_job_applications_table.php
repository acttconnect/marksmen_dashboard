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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
             $table->foreignId('job_opening_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->string('full_name');

        $table->string('mobile_number', 20);

        $table->string('email');

        $table->string('current_city');

        $table->string('total_experience');

        $table->string('highest_qualification')
            ->nullable();

        $table->string('resume_path');

        $table->text('brief_note')
            ->nullable();

        $table->enum('status', [
            'new',
            'reviewed',
            'shortlisted',
            'rejected'
        ])->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
