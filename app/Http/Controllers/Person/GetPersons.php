<?php

namespace App\Http\Controllers\Person;

use Illuminate\Routing\Controller;
use App\Models\Person;

class GetPersons extends Controller
{
   public function __invoke() {
       return Person::skip(1500)->limit(10)->get();
   }

   public function getPersons() {
       return Person::skip(1)->limit(10)->get();
   }
}
