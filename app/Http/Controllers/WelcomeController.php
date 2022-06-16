<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carusel;
use App\Models\slider;
use App\Models\comment;
use App\Models\partner;
use App\Models\category;
use App\Models\door;
use App\Models\service;
use App\Models\stock;
use App\Models\aboutu;
use App\Models\variation;
use App\Models\application;
use App\Models\contact;
use App\Models\setting;
use App\Models\service_foto;
use App\Models\service_banner;
use App\Models\completed_works;
use App\Models\completed_fotos;
use DB;

class WelcomeController extends Controller
{
    public function partners() {
        $contacts = contact::All();
        $partners = partner::All();
        $settings = setting::All();
        return view('partners', compact('contacts', 'partners', 'settings'));
    }

    public function completed() {
        $contacts = contact::All();
        $settings = setting::All();
        $completed_works = completed_works::All();
        return view('completed', compact('contacts', 'settings', 'completed_works'));
    }
    
    public function completedone($id) {
        $contacts = contact::All();
        $settings = setting::All();
        $work = completed_works::find($id);
        $completed_fotos = completed_fotos::where('id_work', '=', $id)->get()->toArray();
        $fotos = [];
        array_push($fotos, $work['path']);
        foreach($completed_fotos as $foto){
            array_push($fotos, $foto['path']);
        }
        return view('completedone', compact('contacts', 'settings', 'work', 'fotos'));
    }

    public function index() {
        if(!isset($_COOKIE['cart_id'])){
            setcookie('cart_id', uniqid());
        }else{
            \Cart::session($_COOKIE['cart_id']);
        }       
        $cart = \Cart::getContent();
        $category = category::All();
        $partner = partner::All();
        $cat_per_partner = DB::select('select * FROM doors JOIN categories on categories.id_category = categories.id_category JOIN partners on partners.id_partner = doors.id_partner GROUP BY doors.id_partner, doors.id_category');
        $best = variation::where('is_best_price', '!=', null)->get();
        foreach ($category as $item) {
            foreach ($cat_per_partner as $person) {
                if ($person->id_category == $item['id_category']) {
                    $partner_per_cat[] = $person;
                }
            }
        }
        $contacts = contact::All();
        $settings = setting::All();
        $comment = comment::where('is_show','=','1')->get();
        $carusel1 = carusel::where('kind_carusel', '=', '1')->get();
        $carusel2 = carusel::where('kind_carusel', '=', '2')->get();
        $carusel3 = carusel::where('kind_carusel', '=', '3')->get();
        $slider = slider::All();
        foreach ($slider as $key => $value) {
            if(!empty($value->img_slider))
                $value->type_file = mime_content_type(base_path() . '/storage/app/carusel/' . $value->img_slider);
            if(!empty($value->img_slider_mobile))
                $value->type_file_mobile = mime_content_type(base_path() . '/storage/app/carusel/' . $value->img_slider_mobile);
        }
        return view('welcome', compact('carusel1', 'carusel2', 'carusel3', 'slider', 'comment', 'partner', 'category', 'best', 'contacts', 'settings', 'cart', 'partner_per_cat'));
    }

    public function contact() {
        if(!isset($_COOKIE['cart_id'])){
            setcookie('cart_id', uniqid());
        }else{
            \Cart::session($_COOKIE['cart_id']);
        }  
        $cart = \Cart::getContent();
        $contacts = contact::All();
        $settings = setting::All();
        $category = category::All();
        $cat_per_partner = DB::select('select * FROM doors JOIN categories on categories.id_category = categories.id_category JOIN partners on partners.id_partner = doors.id_partner GROUP BY doors.id_partner, doors.id_category');
        foreach ($category as $item) {
            foreach ($cat_per_partner as $person) {
                if ($person->id_category == $item['id_category']) {
                    $partner_per_cat[] = $person;
                }
            }
        }
        $partner = partner::All();
        return view('contact', compact('partner', 'category', 'contacts', 'settings', 'cart', 'partner_per_cat'));
    }

    public function politika() {
        if(!isset($_COOKIE['cart_id'])){
            setcookie('cart_id', uniqid());
        }else{
            \Cart::session($_COOKIE['cart_id']);
        }  
        $cart = \Cart::getContent();
        $contacts = contact::All();
        $settings = setting::All();
        $category = category::All();
        $cat_per_partner = DB::select('select * FROM doors JOIN categories on categories.id_category = categories.id_category JOIN partners on partners.id_partner = doors.id_partner GROUP BY doors.id_partner, doors.id_category');
        foreach ($category as $item) {
            foreach ($cat_per_partner as $person) {
                if ($person->id_category == $item['id_category']) {
                    $partner_per_cat[] = $person;
                }
            }
        }
        $partner = partner::All();
        return view('politika', compact('partner', 'category', 'contacts', 'settings', 'cart', 'partner_per_cat'));
    }

    public function feedback() {
        if(!isset($_COOKIE['cart_id'])){
            setcookie('cart_id', uniqid());
        }else{
            \Cart::session($_COOKIE['cart_id']);
        }  
        $cart = \Cart::getContent();
        $contacts = contact::All();
        $settings = setting::All();
        $category = category::All();
        $cat_per_partner = DB::select('select * FROM doors JOIN categories on categories.id_category = categories.id_category JOIN partners on partners.id_partner = doors.id_partner GROUP BY doors.id_partner, doors.id_category');
        foreach ($category as $item) {
            foreach ($cat_per_partner as $person) {
                if ($person->id_category == $item['id_category']) {
                    $partner_per_cat[] = $person;
                }
            }
        }
        $partner = partner::All();
        $comment = comment::All();
        return view('feedback', compact('partner', 'category', 'comment', 'contacts', 'settings', 'cart', 'partner_per_cat'));
    }
    
    public function services() {
        if(!isset($_COOKIE['cart_id'])){
            setcookie('cart_id', uniqid());
        }else{
            \Cart::session($_COOKIE['cart_id']);
        }  
        $cart = \Cart::getContent();
        $contacts = contact::All();
        $settings = setting::All();
        $service = service::All();
        $category = category::All();
        $service_banner = service_banner::All();
        $cat_per_partner = DB::select('select * FROM doors JOIN categories on categories.id_category = categories.id_category JOIN partners on partners.id_partner = doors.id_partner GROUP BY doors.id_partner, doors.id_category');
        foreach ($category as $item) {
            foreach ($cat_per_partner as $person) {
                if ($person->id_category == $item['id_category']) {
                    $partner_per_cat[] = $person;
                }
            }
        }
        $partner = partner::All();
        return view('services', compact('service_banner', 'partner', 'category', 'service', 'contacts', 'settings', 'cart', 'partner_per_cat'));
    }

    public function stocks() {
        if(!isset($_COOKIE['cart_id'])){
            setcookie('cart_id', uniqid());
        }else{
            \Cart::session($_COOKIE['cart_id']);
        }  
        $cart = \Cart::getContent();
        $contacts = contact::All();
        $settings = setting::All();
        $stock = stock::All();
        $category = category::All();
        $cat_per_partner = DB::select('select * FROM doors JOIN categories on categories.id_category = categories.id_category JOIN partners on partners.id_partner = doors.id_partner GROUP BY doors.id_partner, doors.id_category');
        foreach ($category as $item) {
            foreach ($cat_per_partner as $person) {
                if ($person->id_category == $item['id_category']) {
                    $partner_per_cat[] = $person;
                }
            }
        }
        $partner = partner::All();
        return view('stocks', compact('partner', 'category', 'stock', 'contacts', 'settings', 'cart', 'partner_per_cat'));
    }
    
    public function about() {
        if(!isset($_COOKIE['cart_id'])){
            setcookie('cart_id', uniqid());
        }else{
            \Cart::session($_COOKIE['cart_id']);
        }  
        $cart = \Cart::getContent();
        $contacts = contact::All();
        $settings = setting::All();
        $aboutus = aboutu::All();
        $category = category::All();
        $cat_per_partner = DB::select('select * FROM doors JOIN categories on categories.id_category = categories.id_category JOIN partners on partners.id_partner = doors.id_partner GROUP BY doors.id_partner, doors.id_category');
        foreach ($category as $item) {
            foreach ($cat_per_partner as $person) {
                if ($person->id_category == $item['id_category']) {
                    $partner_per_cat[] = $person;
                }
            }
        }
        $partner = partner::All();
        return view('about', compact('partner', 'category', 'aboutus', 'contacts', 'settings', 'cart', 'partner_per_cat'));
    }

    public function app(Request $request) {
        try{
            $application = new application();
            $application->name_application = $request->name;
            $application->phone_application = $request->phone;
            $application->save();
            $message = "Имя: " . $request->name . "\r\n" . "\n";
            $message .=  "\r\nНомер телефона: ".$request->phone . "\r\n";
            $headers = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
            mail('reborn-80lvl@yandex.ru', 'Заявка', $message, $headers);
            return redirect()->back()->with('ok', 'ok');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', 'error');
        }
    }

    public function komm(Request $request) {
        try{
            $comment = new comment();
            $comment->name_comment = $request->author;
            $comment->email_comment = $request->email;
            $comment->phone_comment = $request->phone;
            $comment->text_comment = $request->comment;
            $comment->is_show = 1;
            $comment->save();
            return redirect()->back()->with('ok', 'ok');        
        }catch(\Throwable $th){
            return redirect()->back()->with('error', 'error');
        }
    }

    public function serviceone(Request $request, $id) {
        $contacts = contact::All();
        $settings = setting::All();
        $service = service::where('id_service', '=', $id)->first();
        $service_foto = service_foto::where('id_service', '=', $id)->get()->toArray();
        $services = service::where('id_service', '!=', $id)->inRandomOrder()->limit(15)->get();
        $fotos = [];
        array_push($fotos, $service['img_service']);
        foreach($service_foto as $foto){
            array_push($fotos, $foto['path']);
        }
        return view('serviceone', compact('contacts', 'settings', 'service', 'services', 'fotos'));
    }
}
