<?php

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create(['name' => 'Leading specialist Control Department']);
        Position::create(['name' => 'Architect Dev Development Department']);
        Position::create(['name' => 'Front End Dev Development Department']);
        Position::create(['name' => 'Back End Dev Development Department']);
        Position::create(['name' => 'DevOps and Ddl Development Department']);
        Position::create(['name' => 'DataBase Administrator Development Department']);
        Position::create(['name' => 'Sales Manager Marketing and Sales Unit']);
        Position::create(['name' => 'Secretary Reception and Facilities Block']);
        Position::create(['name' => 'Designer Usability and UI Department']);
        Position::create(['name' => 'Researcher Usability and UI Department']);
    }
}
