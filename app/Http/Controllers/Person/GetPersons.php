<?php

namespace App\Http\Controllers\Person;

use Illuminate\Routing\Controller;
use App\Models\Person;

class GetPersons extends Controller
{
   public function __invoke() {
       return Person::limit(10)->get();
   }
}
