<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;

class Test extends Controller
{
   public  function __invoke()
   {
       $c = Item::all();
       return $c;

   }
}
