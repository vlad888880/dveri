<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\door;
use App\Models\variation;
use App\Models\color;
use App\Models\material;
use App\Models\partner;
use App\Models\category;
use App\Models\glass;
use App\Models\characteristics; 
use App\Models\variation_of_recomend;
use App\Models\contact;
use App\Models\setting;
use App\Models\order;
use App\Models\shades;
use App\Models\stock;
use App\Models\service;
use App\Models\shades_color;
use App\Models\order_per_item; 
use App\Mail\OrderMail; 
use Illuminate\Support\Facades\Mail;
// use Darryldecode\Cart\Cart;
use Darryldecode\Cart\CartCondition;
use Cookie;
use DB;

class catalogController extends Controller
{

    public function get_service(Request $request){
        $service = service::where('id_service', $request->id)->first();
        return response()->json(['service' => $service]);
    }

    public function get_stock(Request $request){
        $stock = stock::where('id_stock', $request->id)->first();
        return response()->json(['stock' => $stock]);
    }

    public function index(Request $request) {
        $builder = DB::table('doors')
        ->join('variations', 'doors.id_door', '=', 'variations.id_door')
        ->join('colors', 'colors.id_color', '=', 'variations.id_color')
        ->join('materials', 'colors.id_material', '=', 'materials.id_material')
        ->join('shades_color', 'shades_color.color_id', '=', 'colors.id_color');
    
        if ($request->has('collection')) {
            $builder->whereIn('doors.id_door', $request->collection);
        }

        if ($request->has('partner')) {
            $builder->whereIn('doors.id_partner', $request->partner);
        }

        if ($request->has('material')) {
            $builder->whereIn('colors.id_material', $request->material);
        }

        if ($request->has('category')) {
            $builder->whereIn('doors.id_category', $request->category);
        }

        if ($request->has('color')) {
            $builder->whereIn('variations.id_color', $request->color);
        }

        if ($request->has('shades')) {
            $builder->whereIn('shades_color.shades_id', $request->shades);
        }

        if ($request->has('price')) {
            foreach($request->price as $item){
                switch ($item) {
                    case '1':
                        $builder->orwhereBetween('variations.price_door', [0, 10000]);
                        break;
                    case '2':
                        $builder->orwhereBetween('variations.price_door', [10000, 25000]);
                        break;
                    case '3':
                        $builder->orwhere('variations.price_door', '>', 25000);
                        break;
                }
            }
        }

        $builder->groupBy('variations.id_variation');

        if ($request->has('sorting')) {
            switch ($request->sorting) {
                default:
                    break;
                case 'price_max':
                    $builder->orderBy('variations.price_door', 'desc');
                    break;
                case 'price_min':
                    $builder->orderBy('variations.price_door');
                    break;
                case 'new':
                    $builder->orderBy('variations.updated_at', 'desc');
                    break;
                case 'call':
                    $builder->orderBy('variations.name_variation');
                    break;
                // case 'popular':
                //     $builder->orderBy('variations.name_variation');
                //     break;
            }
        }
        $cnt = count($builder->get());
        $door = $builder->paginate(24);
        return view('variationAjax', ['door' => $door, 'cnt' => $cnt])->render();
    }

    public function glass(Request $request) {
        $glass = DB::select('select * from glasses join variations on variations.id_glass = glasses.id_glass where variations.id_color = :id_color and variations.type_variation = :type and variations.id_door = :id_door', ['id_door' => $request->id_door, 'type' => $request->type, 'id_color' => $request->id_color]);
        return view('glassAjax', ['glass' => $glass, 'id_glass' => $request->id_glass, 'model' => $request->model])->render();
    }

    public function shop(Request $request) {
        if(!isset($_COOKIE['cart_id'])){
            setcookie('cart_id', uniqid());
        }else{
            \Cart::session($_COOKIE['cart_id']);
        }  
        $cart = \Cart::getContent();
        $category = category::All();
        $cat_per_partner = DB::select('select * FROM doors JOIN categories on categories.id_category = categories.id_category JOIN partners on partners.id_partner = doors.id_partner GROUP BY doors.id_partner, doors.id_category');
        foreach ($category as $item) {
            foreach ($cat_per_partner as $person) {
                if ($person->id_category == $item['id_category']) {
                    $partner_per_cat[] = $person;
                }
            }
        }
        $collection = door::All();
        $contacts = contact::All();
        $settings = setting::All();
        $shades = shades::All();
        $material = material::All();
        $partner = partner::All();
        $door = Self::index($request);
        return view('shop', compact('door', 'partner', 'category', 'material', 'contacts', 'collection', 'settings', 'cart', 'shades', 'partner_per_cat'));
    }

    public function show(Request $request, $id, $model, $type) {
        if(!isset($_COOKIE['cart_id'])){
            setcookie('cart_id', uniqid());
        }else{
            \Cart::session($_COOKIE['cart_id']);
        }  
        $cart = \Cart::getContent();
        $contacts = contact::All();
        $settings = setting::All();
        $characteristics = array();
        foreach (characteristics::where('id_host', '=', $id)->get() as $key => $item) 
            if ($item['id_type'] == null || $item['id_type'] == $type) 
                $characteristics[] = $item;
        $category = category::All();
        $cat_per_partner = DB::select('select * FROM doors JOIN categories on categories.id_category = categories.id_category JOIN partners on partners.id_partner = doors.id_partner GROUP BY doors.id_partner, doors.id_category');
        foreach ($category as $item) {
            foreach ($cat_per_partner as $person) {
                if ($person->id_category == $item['id_category']) {
                    $partner_per_cat[] = $person;
                }
            }
        }
        $cnt_glass = count(DB::select('select * from glasses join variations on variations.id_glass = glasses.id_glass where variations.id_variation = :id_variation and variations.type_variation = :type and variations.id_door = :id_door', ['id_door' => $id, 'type' => $type, 'id_variation' => $model]));
        $recomend = DB::select('select * from variations join variation_of_recomends on variation_of_recomends.id_recomended = variations.id_variation WHERE variation_of_recomends.id_door = :id', ['id' => $id]);
        $partner = partner::All();
        $door = door::where('id_door', '=', $id)->get();
        $variation = variation::where('id_door', '=', $id)->groupby('type_variation')->get();
        $ccolor = variation::where('id_door', '=', $id)->where('id_variation', '=', $model)->get();
        $ccolor = $ccolor[0]['id_color'];
        $variation_select = DB::select('select * from variations join colors on variations.id_color = colors.id_color where variations.id_variation = :model group by variations.id_variation', ['model' => $model]);
        $variation_for_color = DB::select('select * from materials JOIN colors on materials.id_material = colors.id_material JOIN variations on colors.id_color = variations.id_color where variations.id_door = :id and variations.type_variation = :type GROUP by variations.id_color', ['id' => $id, 'type' => $type]);
        $variation_for_images = DB::select('select * from materials JOIN colors on materials.id_material = colors.id_material JOIN variations on colors.id_color = variations.id_color where variations.id_door = :id and variations.type_variation = :type', ['id' => $id, 'type' => $type]);
        $color = DB::select('select * from colors JOIN variations where colors.id_color = variations.id_color and variations.id_door = :id and variations.type_variation = :type', ['id' => $id, 'type' => $type]);
        $material = DB::select('select * from materials left JOIN colors on materials.id_material = colors.id_material left JOIN variations on colors.id_color = variations.id_color where variations.id_door = :id and variations.type_variation = :type GROUP by materials.id_material', ['id' => $id, 'type' => $type]); 
        return view('model', compact('ccolor', 'variation_for_color', 'cnt_glass', 'door', 'variation', 'color', 'material', 'category', 'partner', 'model', 'id', 'type', 'variation_for_images', 'characteristics', 'recomend', 'variation_select', 'contacts', 'settings', 'cart', 'partner_per_cat'));
    }

    public function addToCart(Request $request) {
      
        // variation::where('id_variation', $request->input('id'))->first();
        if(!isset($_COOKIE['cart_id'])){
            setcookie('cart_id', uniqid());
        }else{
            \Cart::session($_COOKIE['cart_id']);
        }  
        $product = DB::table('variations')
        ->join('colors', 'variations.id_color', '=', 'colors.id_color')
        ->join('materials', 'colors.id_material', '=', 'materials.id_material')
        ->where('id_variation', $request->input('id'))
        ->first();
        $product->price_door == null ? $price = 0 : $price = $product->price_door;
        \Cart::add(array(
            'id' =>  $product->id_variation,
            'name' => $product->name_variation,
            'price' => $price,
            'quantity' => $request->input('count'),
            'attributes' => [
                'img' => $product->img_variation,
                'color' => $product->name_color,
                'material' => $product->name_material
            ]
        ));
    }
    
    public function cart() {
        if(!isset($_COOKIE['cart_id'])){
            setcookie('cart_id', uniqid());
        }else{
            \Cart::session($_COOKIE['cart_id']);
        }  
        $contacts = contact::All();
        $settings = setting::All();
        $partner = partner::All();
        $cart = \Cart::getContent();
        $category = category::All();
        $cat_per_partner = DB::select('select * FROM doors JOIN categories on categories.id_category = categories.id_category JOIN partners on partners.id_partner = doors.id_partner GROUP BY doors.id_partner, doors.id_category');
        foreach ($category as $item) {
            foreach ($cat_per_partner as $person) {
                if ($person->id_category == $item['id_category']) {
                    $partner_per_cat[] = $person;
                }
            }
        }
        return view('cart', compact('partner', 'category', 'contacts', 'settings', 'cart', 'partner_per_cat'));
    }

    public function delItem(Request $request) {
        if(!isset($_COOKIE['cart_id'])){
            setcookie('cart_id', uniqid());
        }else{
            \Cart::session($_COOKIE['cart_id']);
        }  
        \Cart::remove($request->input('del'));
    }

    public function order(Request $request) {
        try{
            if(!isset($_COOKIE['cart_id'])){
                setcookie('cart_id', uniqid());
            }else{
                \Cart::session($_COOKIE['cart_id']);
            }  
            $order = new order();
            $order->name_order = $request->name;
            $order->phone_order = $request->phone;
            $order->save();
            $name = $request->name;
            $phone = $request->phone;
            $mass = array();
            foreach (\Cart::getContent() as $key => $item) {
                $mass[$key]['count'] = $item->quantity;
                $mass[$key]['door'] = Variation::where('id_variation', $item->id)->first();
                $mass[$key]['door']['color'] = Color::where('id_color', $mass[$key]['door']['id_color'])->first();
                $mass[$key]['door']['color']['material'] = Material::where('id_material', $mass[$key]['door']['color']['id_material'])->first();
                $mass[$key]['door']['glass'] = Glass::where('id_glass', $mass[$key]['door']['id_glass'])->first();
                $mass[$key]['price'] = $item->price;
            }   
            Mail::to('reborn-80lvl@yandex.ru')->send(new OrderMail($mass, $name, $phone));
            return redirect()->back()->with('ok', 'ok');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', 'error');
        }
    }
}
