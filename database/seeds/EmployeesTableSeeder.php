<?php


use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 0; $i < 1000; $i++)
            Employee::create([
                'name' => $faker->name,
                'phone' => $faker->tollFreePhoneNumber,
                'email' => $faker->email,
                'position' => random_int ( 1 , 10 ),
                'salary' => random_int ( 20000 , 500000 ),
                'head' => random_int ( 1 , 1000 ),
                'hire_date' => $faker->date('Y-m-d', 'now')
            ]);
    }
}
