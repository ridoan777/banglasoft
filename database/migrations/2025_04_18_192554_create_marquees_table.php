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
		Schema::create('marquees', function (Blueprint $table)
		{
			$table->id();
			$table->string('content');
			$table->integer('status')->default(0);
			$table->string('color')->default('text-white');
			$table->string('bg-color')->default('bg-black');
			$table->string('font-size')->default('text-base');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('marquees');
	}
};
