<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\Province;
use App\Department;
use App\City;

class CountryProvinceCityTownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $country = factory(Country::class)->create(["name"=>"Argentina"]);

        $province = factory(Province::class)->create(['country_id' => $country->id, "name"=>"Misiones"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"Apóstoles"]);

        factory(City::class)->create(['department_id' => $department->id, "name"=>"Apóstoles"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Azara"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Estación Apóstoles"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Pindapoy"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Rincón de Azara"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"San Jose"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Tres capones"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"Cainguás"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Campo grande"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Dos de Mayo"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"1º de Mayo"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Pueblo Illia"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Salto Encantado"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"Candelaria"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Bompland"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Candelaria"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Cerro Corá"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Loreto"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Mártires"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Profundidad"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Puerto Santa Ana"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Santa Ana"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"Capital"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Posadas"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Fachinal"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Garupa"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Nemesio Parma"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"Concepción"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Barra Concepción"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Concepción de la Siera"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"La Corita"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Santa María"]);


        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"Eldorado"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Colonia Victoria"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Eldorado"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Maria Magdanela"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"9 de Julio"]);

        factory(City::class)->create(['department_id' => $department->id, "name"=>"9 de Julio Kilómetro 20"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Puerto Mado"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Puerto Pinares"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Santiago de Liniers"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Valle Hermoso"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Villa Roulet"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"General Manuel Belgrano"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Almirante Brown"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Bernardo de Irigoyen"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Dos Hermanas"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Integración"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"San Antonio"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"Guaraní"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"El Soberbio"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Fracrán"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"San Vicente"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"Iguazú"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Esperanza"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Libertad"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Puerto Esperanza"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Puerto Iguazú"]);

        factory(City::class)->create(['department_id' => $department->id, "name"=>"Wanda"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"Leandro N. Alem"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Almafuerte"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Arroyo del Medio"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Caá Yarí"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Cerro Azul"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Dos Arroyos"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Gobernador Lopez"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Leandro N. Alem"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Olegario V. Andrade"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Villa Libertad"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"Libertador Gral. San Martín"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Capioví"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"El Alcázar"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Garuhapé"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Mbopicúa"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Puerto Leoni"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Puerto Rico"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Ruiz de Montoya"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"San Alberto"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"San Gotardo"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"San Miguel"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Villa Akerman"]);


        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"Montecarlo"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Caraguatay"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Laharrague"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Piray Kilometro 18"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Puerto Piray"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Taruma"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Villa Parodi"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"Oberá"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Alberdi"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Campo Ramón"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Campo Viera"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"El Salto"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"General Alvear"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Guaraní"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Los Helechos"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Panambí"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Panambí Kilometro 8"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"San Martín Villa Bonita"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"San Ignacio"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Colonia Polana"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Corpus"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Domingo Savio"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"General Urquiza"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Gobernador Roca"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Helvecia"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Hipolito Irigoyen"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Jardín America"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Oasis"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Roca Chica"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"San Ignacio"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Santo Pipo"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"San Javier"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Florentino Ameghino"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Itacaruaré"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Mojón Grande"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"San Javier"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"San Pedro"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Cruce Caballero"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Paraíso"]);

        factory(City::class)->create(['department_id' => $department->id, "name"=>"Piñalito Sur"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"SAn Pedro"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Tobuna"]);

        $department = factory(Department::class)->create(['province_id' => $province->id, "name"=>"25 de Mayo"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Alba Pose"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Colonia Alicia"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Alba Aurora"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"San Francisco de Asis"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"Santa Rita"]);
        factory(City::class)->create(['department_id' => $department->id, "name"=>"25 de Mayo"]);

    }

}
