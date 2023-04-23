<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Sedes\WithoModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeders extends Seeder
{
    public function run(): void
    
    {
        $spiderman = new User;
        $spiderman->name = "Peter Benjamin Parker";
        $spiderman->email = "spiderman@gmail.com";
        $spiderman->password = Hash::make("Pass01");
        $spiderman->save();

        $hulk = new User;
        $hulk->name = "Robert Bruce Banner";
        $hulk->email = "hulk@gmail.com";
        $hulk->password = Hash::make("Pass02");
        $hulk->save();

        $captain = new User;
        $captain->name = "Steven Rogers";
        $captain->email = "captain_america@gmail.com";
        $captain->password = Hash::make("Pass03");
        $captain->save();

        $superman = new User;
        $superman->name = "Clark Kent";
        $superman->email = "superman@gmail.com";
        $superman->password = Hash::make("Pass04");
        $superman->save();

        $batman = new User;
        $batman->name = "Bruce Wayne";
        $batman->email = "batman@gmail.com";
        $batman->password = Hash::make("Pass05");
        $batman->save();

        $spider = new User;
        $spider->name = "Ben Reilly";
        $spider->email = "scarlet_spider@gmail.com";
        $spider->password = Hash::make("Pass06");
        $spider->save();

        $wonder = new User;
        $wonder->name = "Diana Prince";
        $wonder->email = "wonder_woman@gmail.com";
        $wonder->password = Hash::make("Pass07");
        $wonder->save();

        $doomsday = new User;
        $doomsday->name = "Unkown";
        $doomsday->email = "doomsday@gmail.com";
        $doomsday->password = Hash::make("Pass08");
        $doomsday->save();

        $witch = new User;
        $witch->name = "Wanda Maximoff";
        $witch->email = "scarlet_witch@gmail.com";
        $witch->password = Hash::make("Pass09");
        $witch->save();

        $night = new User;
        $night->name = "Dick Grayson";
        $night->email = "night_wing@gmail.com";
        $night->password = Hash::make("Pass10");
        $night->save();
    }
}
