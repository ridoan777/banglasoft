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
		Schema::create('doctors', function (Blueprint $table)
		{
			$table->id();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('phone')->unique();
			$table->string('reg')->unique();
			$table->string('degree_1');
			$table->string('college_1');
			$table->string('degree_2')->nullable();
			$table->string('college_2')->nullable();
			$table->string('time')->nullable();
			$table->string('chamber')->nullable();
			$table->integer('fee')->nullable();
			$table->string('image')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('doctors');
	}
};
