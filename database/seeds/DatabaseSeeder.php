<?php

use Illuminate\Database\Seeder;
use App\Models\Estado;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('EstadoTableSeeder'); //executa o nosso seeder
    }
}

class EstadoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('estados')->delete();

        Estado::create(array(
            'name' => 'AC'
        ));
        Estado::create(array(
            'name' => 'AL'
        ));
        Estado::create(array(
            'name' => 'AP'
        ));
        Estado::create(array(
            'name' => 'AM'
        ));
        Estado::create(array(
            'name' => 'BA'
        ));
        Estado::create(array(
            'name' => 'CE'
        ));
        Estado::create(array(
            'name' => 'DF'
        ));
        Estado::create(array(
            'name' => 'ES'
        ));
        Estado::create(array(
            'name' => 'GO'
        ));
        Estado::create(array(
            'name' => 'MA'
        ));
        Estado::create(array(
            'name' => 'MT'
        ));
        Estado::create(array(
            'name' => 'MS'
        ));
        Estado::create(array(
            'name' => 'MG'
        ));
        Estado::create(array(
            'name' => 'PA'
        ));
        Estado::create(array(
            'name' => 'PB'
        ));
        Estado::create(array(
            'name' => 'PR'
        ));
        Estado::create(array(
            'name' => 'PE'
        ));
        Estado::create(array(
            'name' => 'PI'
        ));
        Estado::create(array(
            'name' => 'RJ'
        ));
        Estado::create(array(
            'name' => 'RN'
        ));
        Estado::create(array(
            'name' => 'RS'
        ));
        Estado::create(array(
            'name' => 'RO'
        ));
        Estado::create(array(
            'name' => 'RR'
        ));
        Estado::create(array(
            'name' => 'SC'
        ));
        Estado::create(array(
            'name' => 'SP'
        ));
        Estado::create(array(
            'name' => 'SE'
        ));
        Estado::create(array(
            'name' => 'TO'
        ));
    }
}
