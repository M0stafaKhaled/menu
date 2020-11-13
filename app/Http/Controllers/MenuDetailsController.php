<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuDetailsRescource;
use App\Http\Resources\MenuDetailsRescourceCollection;
use App\MenuDetails;
use App\Nova\Menu;
use Illuminate\Http\Request;

class MenuDetailsController extends Controller
{
    public  function index(){
            return  new MenuDetailsRescourceCollection(new  MenuDetailsRescource(MenuDetails::all()));
    }
}
