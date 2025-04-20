<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
	public function definition(): array
	{
		return [
			'name' => $this->faker->name(),
			'email' => $this->faker->unique()->safeEmail(),
			'phone' => $this->faker->unique()->regexify('01[3-9][0-9]{8}'), // Bangladesh format
			'reg' => $this->faker->unique()->regexify('[0-9]{3}/[A-Z]{3}/Doc'), // e.g., 123/DHK/Doc
			'degree_1' => $this->faker->randomElement(['MBBS', 'BDS', 'MD', 'FCPS', 'MS', 'MRCP']),
			'college_1' => $this->faker->randomElement([
				'Dhaka Medical',
				'Suhrawardy Medical',
				'City Dental',
				'Mirpur Dental',
				'Rajshahi Medical',
				'Sylhet Dental',
			]),
			'degree_2' => $this->faker->optional()->randomElement(['PhD', 'FCPS', 'MS', 'DM']),
			'college_2' => $this->faker->optional()->randomElement([
				'Barisal Medical',
				'Rangpur Medical',
				'Chittagong Medical',
				'Mymensingh Medical',
				'Khulna Dental',
				'Cumilla Medical',
			]),
			'time' => $this->faker->randomElement([
				'9:30 AM - 1:30 PM',
				'10:00 AM - 4:00 PM',
				'3:00 PM - 8:00 PM'
			]),
			'chamber' => $this->faker->randomElement([
				'Model Town Hospital, Savar, Dhaka',
				'Green Hospital, Thanpur, Sylhet',
				'Central Hospital, Rajshahi',
				'Apollo Hospital, BDH, Dhaka'
			]),
			'fee' => $this->faker->randomElement([500, 700, 800, 1000, 1200, 1500]),
			'image' => $this->faker->randomElement([
				'storage/admin_files/doctor/doctor_9011.jpg',
            'storage/admin_files/doctor/doctor_5320.jpg',
            'storage/admin_files/doctor/doctor_1011.jpg',
            'storage/admin_files/doctor/doctor_2022.jpg',
            'storage/admin_files/doctor/doctor_3033.jpg',
			]),
		];
	}
}
