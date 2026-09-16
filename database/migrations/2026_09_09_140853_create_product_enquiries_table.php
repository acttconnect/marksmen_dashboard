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
        Schema::create('product_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');

        $table->string('mobile_number', 20);

        $table->string('project_location');

        $table->string('email')
            ->nullable();

        $table->string('product_portfolio');

        $table->text('requirements')
            ->nullable();

        $table->enum('status', [
            'new',
            'contacted',
            'closed'
        ])->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_enquiries');
    }
};
