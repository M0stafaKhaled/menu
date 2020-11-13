<?php
namespace App\Http\Controllers;
use App\Category;
use App\Http\Resources\ItemResource;
use Edujugon\Laradoo\Odoo;
use App\Http\Resources\Table;
use App\Item;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
class ItemController extends Controller
{
   public  function  index(){
       $r = Item::all();
       return  ItemResource::collection($r);
   }
   public  function  viwe($id){
       
       \App\Table::findOrFail($id);
       if(request()->get('category')){
         $items= Item::with('category')->whereHas('category',function ($query){
               $query->where('id',\request()->get('category')) ;
           })->paginate(15) ;
          
        $category = Category::all();
       }else {
           $items = Item::orderBy('id', 'desc')->paginate(15);
           $category = Category::all();
       }
    
       return view('Main')->with('items',$items)->with('category',$category)->with('id',$id) ;
   }
    public  function  re(){
        $items = Item::all();
        return view('Cart')->with('items',$items);
    }
    public function pop(){
        $odoo = new Odoo();
        $odoo->connect();
        $items = $odoo->fields('name','list_price' , 'image_medium' , 'categ_id')->get('product.template');
        $pop =$items;
    //   dd($pop['categ_id']);
            foreach($pop as $p){
                Item::create(['id' => $p['id'], 'name'=>$p['name'],
                    'image'=>$p['image_medium'],
                    'unit_price'=>$p['list_price'],
                ]);
            }
         return $pop;
    }
    public  function  test(){
       $l =  Hashids::encode(4);
       $k = Hashids::encode(3);
        $d =Hashids::decode($l);
    }
}
