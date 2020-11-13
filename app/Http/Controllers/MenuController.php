<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuRescource;
use App\Http\Resources\MenuRescourceCollection;
use App\Menu;
use App\Nova\Resource;
use Illuminate\Http\Request;

class MenuController extends Controller
{
     public  function  index(){
         return  new MenuRescourceCollection( new MenuRescource(Menu::all()));
     }
}
