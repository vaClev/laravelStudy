<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class ShopController extends Controller
{
    public function products(){

        $products = Product::paginate(10);
        return view('products', compact('products'));
    }

    public function cart(Request $request){
        if ($request->session()->has('user')) {
            $user = User::where('id', $request->session()->get('user'))->first();
            $username = $user->name;

            //получить списоктоваров вкорзине и отправить их во view
            $userCart = Cart::where('user_id', $user->id)->get();
            //dd($userCart[0]->product);

            $totalCost = 0;
            $totalCostBase = 0;
            $totalDiscount = 0;
            $countPositions = 0;
            foreach($userCart as $position)
            {
                $oldPrice = $position->product->price;
                $discountPercents = $position->product->discount;
                $discountRubles = $oldPrice*$discountPercents/100;

                $newPrice = $oldPrice-$discountRubles;

                $totalCost += $newPrice*$position->quantity;
                $totalCostBase +=$oldPrice*$position->quantity;
                $totalDiscount += $discountRubles*$position->quantity;
                $countPositions++;
            }


            return view('cart', compact('username', 
            'userCart', 'totalCost','totalCostBase', 'totalDiscount', 'countPositions'));
        }
        return redirect('/products')->with('Exception', 'Корзина доступна только зарегистрированным пользователям');
    }

    public function addToCart(Request $request){
        if($request->session()->has('user')){
            if(isset($_GET['productID']) &&!empty($_GET['productID']))
            {
                $user_id = $request->session()->get('user');
                $productID = $_GET['productID'];

                $rawDB = Cart::where('user_id', $user_id)->where('product_id', $productID)->first();
                if($rawDB!=null){
                    //корректировка количества
                    $rawDB->quantity+=1;
                    $rawDB->save();
                }
                else{
                    //добавление новой позиции
                    $newPosition = new Cart;
                    $newPosition->user_id = $user_id;
                    $newPosition->product_id = $productID;
                    $newPosition->quantity = 1;
                    $newPosition->save();
                }
                return redirect('/products')->with('Succes','Товар добавлен в корзину');
            }
            return redirect('/products')->with('Error','не определен ID товара');
        }
        return redirect('/products')->with('Exception', 'Корзина доступна только зарегистрированным пользователям');
    }
    public function changeQuantity(Request $request){
        if($request->session()->has('user') 
        && isset($_GET['productID']) &&!empty($_GET['productID'])
        && isset($_GET['count'])
        ){
            $user_id = $request->session()->get('user');
            $productID = $_GET['productID'];
            $quantity = $_GET['count'];

            if($quantity<= 0){
                Cart::where('user_id', $user_id)->where('product_id', $productID)->delete();
            }else{
               Cart::where('user_id', $user_id)->where('product_id', $productID)->update(['quantity'=>$quantity]); 
            }
            return redirect('/cart')->with('Succes','Кол-во товара скорректировано');
        }
        return redirect('/cart')->with('Error','Ошибка, не указан ID товара');
    }

    public function loginPage(Request $request){
        if ($request->session()->has('user')) {
            dd($request->session()->all());
            return redirect('/products');
        }       
        return view('loginPage');
    }

    public function toLogin(Request $request):RedirectResponse{
        $login = $request->input('login');
        $password = md5($request->input('pass')); //пока просто шифруем MD5

        //запрос в базу  найди там user c такими то даннымим
        $user = DB::table('users')->select('id', 'email', 'password')
        ->where('email',  $login)
        ->where('password',  $password)
        ->first();

        if($user){
            $request->session()->put('user', $user->id);
            return redirect('/products');
        }else{
            return redirect('/loginPage');
        } 
    }
    public function toLogout(Request $request):RedirectResponse{
        if ($request->session()->has('user')) {
            $request->session()->flush();
        }
        return redirect('/loginPage');
    }
}
