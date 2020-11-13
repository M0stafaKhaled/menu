<?php

use App\Http\Events\FormSubmited;
use App\Item;
use App\User;
use App\Table;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use function GuzzleHttp\Promise\all;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/tos','TableController@tos');
Route::get('lo',function(Request $request){
Auth::logout();
//dd(Hash::make(12));
 //   dd(Hash::check('$2y$10$qkb2z2N0CtlMpesYahjnUOwr.5RQkJjtv39x0YqvGNz2RG8KnXVKq' ,''));
    // $this->validate($request, [
    //     'email' => 'required|email', 'password' => 'required',
    // ]);
   // Auth::logout();
    // $credentials = $request->only('email', 'password');
        $credentials  = ['email' => '1KRF0STR1w@3' ,'password'=>'12'];
    if (auth()->attempt($credentials))
    { //this if validate if the user is on the database line 1
        return "woo";
        //this redirect if user is the db line 2
    }
    // return redirect($this->loginPath())
    //             ->withInput($request->only('email', 'remember'))
    //             ->withErrors([
    //                 'email' => $this->getFailedLoginMessage(),
    //             ]);
    return "error";
});
Route::get('/sender',function (){
    return view('send');
 });

 Route::post('/sender',function (){
     $text = request()->text;
    event(new FormSubmited($text));
 });
Route::get('/oldMenu', function () {
    return view('welcome');
});
Route::get('/kit','kitchenController@index')->middleware([ 'auth', 'KitchenMiddleware']);
Route::get('/te',function (){
  $re=  User::create([
        'name' => "mostafa",
        'email' => "mkostafam79@gmail.com",
        'password' => bcrypt("24235258"),
        'type'=>2
    ]);
    dd($re);
});
Route::get('/table/{id}','ItemController@viwe')->name('item')->middleware(['PasswordlifeTime']);
Route::get('category/{id}','ItemController@viwes')->name('ss');
Route::get('/cart/{token}','OrderController@order')->name('cart.show');
Route::get('/pop','ItemController@pop');
Auth::routes(['register' => false]);
Route::get('/chat', 'ChatController@index')->name('chat');
Route::get('/message', 'MessageController@index')->name('message');
Route::post('/message', 'MessageController@store')->name('message.store');
Route::get('/singles/{id}','ChatController@single');
Route::get('/single/{id}','MessageController@single')->name('singleMessage');
Route::post('/singleMessage/{id}','MessageController@singleStore')->name('singleStore');
Route::get('/order/{token}','OrderController@myOrder');
Route::get('/t','OdooController@index');
Route::get('/test','ItemController@test');
Route::get('/min',function(){
    $table = Table::find(1);
});
Route::get('/password',function(Request $request){
  return view('CreatePassword');
})->name('password');
Route::get('/log',function(){
    return view('Password');
})->name('go');
Route::get('/mo',function(){
DB::table('orders')->update([
    "status" => 1,
    "estimate_time"=>null,
]);
DB::table('tables')->update([
        "password"=>null
]);
return "mostafa";
});
Route::get('/api/item',function(){
        return Item::all();
});
// Route::get('/check/{token}',function($token){
//     $table_id = request()->segments();
//     $table =Table::find($table_id);
//     $order = Order::query();
//     $order->where('table_id' , $table_id);
//     return $order->where('token' , $token)->get();

// });

Route::get("/fd",function(){
            return Item::all();
});