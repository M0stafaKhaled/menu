<?php

namespace App\Http\Controllers;
use Edujugon\Laradoo\Odoo;
use Illuminate\Http\Request;
class OdooController extends Controller
{

public function index(){
 $odoo = new Odoo();
//  $this->odoo = $this->odoo
//            ->username('admin')
//            ->password('admin')
//            ->db('posresturant')
//            ->host('http://134.122.111.27:8069/')
//            ->connect();

    $odoo->connect();
    //$something =$odoo->create('pos.order',['name' => 'mostafa odoododo']);
    $version = $odoo->version();
    // ->where('state' , '=','closed')
    $userId= $odoo->getUid();
    $structure = $odoo->fields('amount_total')->get('pos.order');
    $items = $odoo->fields('name','list_price' , 'image_medium' , 'categ_id')->get('product.template');

    $SESSION = $odoo->where('state','=','opened')->get('pos.session');
    // return ;
    $pop =$items[0]['image_medium'];
    return  view('tot')->with('pop',$pop);
    // return $odoo->fieldsOf('pos.session');
 //  return $odoo->fieldsOf('pos.order.line');
    // dd($structure['name']);


//return    $SESSION['state'];
// $url = 'http://134.122.111.27:8069/web/';
// $db = 'posresturant';
// $username = "admin";
// $password = 'admin';
}

}
