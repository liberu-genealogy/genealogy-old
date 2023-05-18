<?php

namespace App\Http\Controllers\Person;

use Illuminate\Routing\Controller;
use App\Models\Person;

class GetPersons extends Controller
{
   public function __invoke() {
       return Person::get();
   }

   public function getPersons() {
       return Person::get();
   }
}
