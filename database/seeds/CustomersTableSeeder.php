<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Customers
        $customers = factory(App\Customer::class, 20)->create();

        $this->command->info('Customers Created!');
    }
}
