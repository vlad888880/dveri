<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\door;
use App\Models\variation;
use App\Models\color;
use App\Models\material;
use App\Models\partner;
use App\Models\category;
use App\Models\glass;
use App\Models\characteristics; 
use App\Models\slider; 
use App\Models\shades; 
use App\Models\stock;
use App\Models\service;
use App\Models\shades_color; 
use App\Models\variation_of_recomend;
use App\Models\service_banner;
use App\Models\completed_works;
use App\Models\completed_fotos;
use App\Models\service_foto;
use DB;

class adminController extends Controller
{
    public function category_all() {
        $category = category::All();
        return view('all/category', compact('category'));
    }

    public function partner_all() {
        $partner = partner::All();
        return view('all/partner', compact('partner'));
    }

    public function partner_open_edit($id) {
        $partner = partner::where('id_partner', '=', $id)->get();
        return view('edit/partner', compact('partner'));
    }

    public function partner_edit(Request $request, $id) {
        if(!empty($request->bg_img))
            Storage::putFileAs('banner_of_partner', $request->bg_img, $request->file('bg_img')->getClientOriginalName());
        if(!empty($request->img_partner))
            Storage::putFileAs('partner', $request->img_partner, $request->file('img_partner')->getClientOriginalName());
        $partner_old = partner::where('id_partner', '=', $id)->get();
        empty($request->bg_img) ? $bg_img = $partner_old[0]['bg_img'] : $bg_img = $request->bg_img->getClientOriginalName();
        empty($request->img_partner) ? $img_partner = $partner_old[0]['img_partner'] : $img_partner = $request->img_partner->getClientOriginalName();
        $name_partner = $request->name_partner;
        $text_partner = $request->text_partner;
        $mini_title = $request->mini_title;
        $mini_subtitle = $request->mini_subtitle;
        $link_partner = $request->link_partner;
        $partner = DB::select("update partners
                    SET img_partner = :img_partner,
                    name_partner = :name_partner,
                    bg_img = :bg_img,
                    text_partner = :text_partner,
                    mini_title = :mini_title,
                    mini_subtitle = :mini_subtitle,
                    link_partner = :link_partner
                    WHERE id_partner = :id", [$img_partner, $name_partner, $bg_img, $text_partner, $mini_title, $mini_subtitle, $link_partner, $id]);
        return redirect()->back();
    }

    public function partner_del($id){
        $partner =  DB::select("delete from partners WHERE id_partner = :id", [$id]);
        return redirect()->back();
    }

    public function material_all() {
        $material = material::All();
        return view('all/material', compact('material'));
    }

    public function door_all() {
        $door = DB::select('select * from doors join partners on partners.id_partner = doors.id_partner join categories on categories.id_category = doors.id_category');
        return view('all/door', compact('door'));
    }

    public function color_all() {
        $color = DB::select('select * from materials join colors on colors.id_material = materials.id_material');
        return view('all/color', compact('color'));
    }

    public function color_edit() {
        $color = color::find('select * from materials join colors on colors.id_material = materials.id_material');
        return view('all/color', compact('color'));
    }

    public function admin() {
        return view('admin');
    }

    public function door() {
        $partner = partner::All();
        $category = category::All();
        return view('door', compact('partner', 'category'));
    }
    
    public function door_new(Request $request) {
        $door = new door();
        if(!empty($request->preview_door)){
            Storage::putFileAs('door', $request->preview_door, $request->file('preview_door')->getClientOriginalName());
            $door->preview_door = $request->preview_door->getClientOriginalName();
        } 
        $door->id_partner = $request->id_partner;
        $door->id_category = $request->id_category;
        $door->name_door = $request->name_door;
        $door->description_door = $request->description_door;
        $door->is_new = $request->is_new;
        $door->is_best_price = $request->is_best_price;
        $door->have_guard = $request->have_guard;
        $door->price_collection = $request->price_collection;
        $door->save();
        if(isset($request->name_characteristics)) {
            foreach ($request->name_characteristics as $key => $item) {
                $characteristics = new characteristics();
                $characteristics->name_characteristics = $request->name_characteristics[$key];
                $characteristics->id_host = $door['id'];
                $characteristics->key1 = $request->key1[$key];
                $characteristics->key2 = $request->key2[$key];
                $characteristics->key3 = $request->key3[$key];
                $characteristics->key4 = $request->key4[$key];
                $characteristics->key5 = $request->key5[$key];
                $characteristics->key6 = $request->key6[$key];
                $characteristics->key7 = $request->key7[$key];
                $characteristics->key8 = $request->key8[$key];
                $characteristics->key9 = $request->key9[$key];
                $characteristics->key10 = $request->key10[$key];
                $characteristics->value1 = $request->value1[$key];
                $characteristics->value2 = $request->value2[$key];
                $characteristics->value3 = $request->value3[$key];
                $characteristics->value4 = $request->value4[$key];
                $characteristics->value5 = $request->value5[$key];
                $characteristics->value6 = $request->value6[$key];
                $characteristics->value7 = $request->value7[$key];
                $characteristics->value8 = $request->value8[$key];
                $characteristics->value9 = $request->value9[$key];
                $characteristics->value10 = $request->value10[$key];
                $characteristics->save();
            }
        }
        return redirect()->back();
    }     

    public function color() {
        $material = material::All();
        return view('colors', compact('material'));
    } 

    public function color_new(Request $request) {
        try{
            Storage::putFileAs('color', $request->img_color, $request->file('img_color')->getClientOriginalName());
            $color = new color();
            $color->img_color = $request->img_color->getClientOriginalName();
            $color->name_color = $request->name_color;
            $color->id_material = $request->id_material;
            $color->save();
        }catch(\Throwable $th){
            return 'Ошибка сервера!';
        }
        return redirect()->back();
    } 

    public function complete_new(Request $request) {
        try{
            Storage::putFileAs('service', $request->img, $request->file('img')->getClientOriginalName());
            $complete = new completed_works();
            $complete->path = $request->img->getClientOriginalName();
            $complete->name = $request->name;
            $complete->description = $request->description;
            $complete->purpose = $request->purpose;
            $complete->works = $request->works;
            $complete->feedback = $request->feedback;
            $complete->save();
        }catch(\Throwable $th){
            return 'Ошибка сервера!';
        }
        return redirect()->back();
    } 

    public function complete() {
        return view('complete');
    }

    public function complete_all() {
        $complete = completed_works::all();
        return view('all/complete', compact('complete'));
    } 

    public function complete_open_edit($id) {
        $complete = completed_works::where('id', '=', $id)->first();
        $fotos = completed_fotos::where('id_work', '=', $id)->get();
        return view('edit/complete', compact('complete', 'fotos'));
    }

    public function complete_edit(Request $request, $id) {
        $complete = completed_works::where('id', '=', $id)->first();
        empty($request->img) ? $img = $banner['path'] : $img = $request->file('img')->store('','service');
        $name = $request->name;
        $description = $request->description;
        $purpose = $request->purpose;
        $works = $request->works;
        $feedback = $request->feedback;
        $stocks = DB::select("update completed_works
                    SET path = :img,
                    name = :name,
                    purpose = :purpose,
                    description = :description,
                    works = :works,
                    feedback = :feedback
                    WHERE id = :id", [$img, $name, $purpose, $description, $works, $feedback, $id]);
        return redirect()->back();
    }

    public function complete_foto_new(Request $request) {
        if(null != $request->file('img')){
            foreach ($request->file('img') as $value) {
                $foto = new completed_fotos();
                $foto->path = $value->store($request->id, 'service');
                $foto->id_work = $request->id;
                $foto->save();
            }
        }
        return redirect()->back();
    }

    public function complete_foto_del(Request $request) {
        $foto = completed_fotos::find($request->id);
        $foto->delete();
        return response()->json(['succsess' => $foto]);
    }

    public function service_foto_new(Request $request) {
        if(null != $request->file('img')){
            foreach ($request->file('img') as $value) {
                $foto = new service_foto();
                $foto->path = $value->store($request->id, 'service');
                $foto->id_service = $request->id;
                $foto->save();
            }
        }
        return redirect()->back();
    }

    public function service_foto_del(Request $request) {
        $foto = service_foto::find($request->id);
        $foto->delete();
        return response()->json(['succsess' => $foto]);
    }

    public function complete_del($id) {
        $banner = DB::select("delete from completed_works WHERE id = :id", [$id]);
        return redirect()->back();
    }

    public function banner_new(Request $request) {
        try{
            Storage::putFileAs('service', $request->img, $request->file('img')->getClientOriginalName());
            Storage::putFileAs('service', $request->mobile, $request->file('mobile')->getClientOriginalName());
            $banner = new service_banner();
            $banner->path = $request->img->getClientOriginalName();
            $banner->mobile_path = $request->mobile->getClientOriginalName();
            $banner->name = $request->name;
            $banner->link = $request->link;
            $banner->description = $request->description;
            $banner->save();
        }catch(\Throwable $th){
            return 'Ошибка сервера!';
        }
        return redirect()->back();
    } 

    public function banner() {
        return view('banner');
    }

    public function banner_all() {
        $banner = service_banner::all();
        return view('all/banner', compact('banner'));
    } 

    public function banner_open_edit($id) {
        $banner = service_banner::where('id', '=', $id)->first();
        return view('edit/banner', compact('banner'));
    }

    public function banner_edit(Request $request, $id) {
        $banner = service_banner::where('id', '=', $id)->first();
        empty($request->img) ? $img = $banner['path'] : $img = $request->file('img')->store('','service');
        empty($request->mobile) ? $mobile = $banner['mobile_path'] : $mobile = $request->file('mobile')->store('','service');
        $name = $request->name;
        $description = $request->description;
        $link = $request->link;
        $stocks = DB::select("update service_banner
                    SET path = :img,
                    mobile_path = :mobile,
                    name = :name,
                    description = :description,
                    link = :link
                    WHERE id = :id", [$img, $mobile, $name, $description, $link, $id]);
        return redirect()->back();
    }

    public function banner_del($id)   {
        $banner = DB::select("delete from service_banner WHERE id = :id", [$id]);
        return redirect()->back();
    }

    public function material() {
        return view('material');
    } 

    public function material_new(Request $request) {
        try{
            $material = new material();
            $material->name_material = $request->name_material;
            $material->save();
        }catch(\Throwable $th){
            return 'Ошибка сервера!';
        }
        return redirect()->back();
    } 

    public function glasses() {
        return view('glass');
    } 

    public function glass_new(Request $request) {
        try{
            $glass = new glass();
            Storage::putFileAs('glasses', $request->img_glass, $request->file('img_glass')->getClientOriginalName());
            $glass->img_glass = $request->img_glass->getClientOriginalName();
            $glass->name_glass = $request->name_glass;
            $glass->group_glass = $request->group_glass;
            $glass->save();
        }catch(\Throwable $th){
            return 'Ошибка сервера!';
        }
        return redirect()->back();
    }
    
    public function variation() {
        $glass = glass::All();
        $door = door::All();
        $color = DB::select('select * from colors JOIN materials on colors.id_material = materials.id_material');
        return view('variation', compact('color', 'door', 'glass'));
    } 

    public function variation_all() {
        $variation = DB::table('variations')
        ->join('doors', 'variations.id_door', '=', 'doors.id_door')
        ->join('colors', 'variations.id_color', '=', 'colors.id_color')
        ->join('materials', 'colors.id_material', '=', 'materials.id_material')
        ->groupBy('variations.name_variation')
        ->paginate(24);
        return view('all/variation', compact('variation'));
    } 

    public function variation_open_edit($id) {
        $variation = DB::select('select * from variations where variations.id_variation = :id', [$id]);
        $door = door::All();
        $glass = glass::All();
        $color = DB::select('select * from colors join materials on colors.id_material = materials.id_material');
        return view('edit/variation', compact('variation', 'color', 'door', 'glass'));
    }

    public function variation_edit(Request $request, $id) {
        if(!empty($request->img_variation)){
            $path = $request->file('img_variation')->store('','variation');
        }
        $variation_old = variation::where('id_variation', '=', $id)->get();
        empty($request->img_variation) ? $img_variation = $variation_old[0]['img_variation'] : $img_variation = $path;
        $name_variation = $request->name_variation;
        $article_variation = $request->article_variation;
        $id_color = $request->id_color;
        $id_door = $request->id_door;
        $type_variation = $request->type_variation;
        $have_guard = $request->have_guard;
        $price_door = $request->price_door;
        $is_new = $request->is_new;
        $is_best_price = $request->is_best_price;
        if($request->id_glass != 0){
            $id_glass = $request->id_glass;
            $partner = DB::select("update variations
            SET name_variation = :name_variation,
            img_variation = :img_variation,
            type_variation = :type_variation,
            id_color = :id_color,
            id_door = :id_door,
            id_glass = :id_glass,
            have_guard = :have_guard,
            price_door = :price_door,
            is_new  = :is_new,
            is_best_price = :is_best_price
            WHERE id_variation = :id", [$name_variation, $img_variation, $type_variation, 
            $id_color, $id_door, $id_glass, $have_guard, $price_door, $is_new, $is_best_price, $id]);
        }else{
            $partner = DB::select("update variations
            SET name_variation = :name_variation,
            img_variation = :img_variation,
            type_variation = :type_variation,
            id_color = :id_color,
            id_door = :id_door,
            id_glass = :id_glass,
            have_guard = :have_guard,
            price_door = :price_door,
            is_new  = :is_new,
            is_best_price = :is_best_price
            WHERE id_variation = :id", [$name_variation, $img_variation, $type_variation, 
            $id_color, $id_door, null, $have_guard, $price_door, $is_new, $is_best_price, $id]);
        }
        return redirect()->back();
    }

    public function variation_del($id) {
        $partner =  DB::select("delete from variations WHERE id_variation = :id", [$id]);
        return redirect()->back();
    }

    public function variation_new(Request $request) {
        try{
            $variation = new variation();
            if(!empty($request->img_variation)){
                $path = $request->file('img_variation')->store('','variation');
                $variation->img_variation = $path;
            } 
            if(!empty($request->img_variation_second)){
                $path_second = $request->file('img_variation_second')->store('','variation');
                $variation->img_variation_second = $path_second;
            }
            $variation->article_variation = $request->article_variation;
            $variation->id_color = $request->id_color;
            $request->id_glass == 0 ? "" : $variation->id_glass = $request->id_glass;
            $variation->name_variation = $request->name_variation;
            $variation->id_door = $request->id_door;
            $variation->type_variation = $request->type_variation;
            $variation->save();
            if(isset($request->name_characteristics)) {
                foreach ($request->name_characteristics as $key => $item) {
                    $characteristics = new characteristics();
                    $characteristics->name_characteristics = $request->name_characteristics[$key];
                    $characteristics->id_host = $request->id_door;
                    $characteristics->id_type = $request->type_variation;
                    $characteristics->key1 = $request->key1[$key];
                    $characteristics->key2 = $request->key2[$key];
                    $characteristics->key3 = $request->key3[$key];
                    $characteristics->key4 = $request->key4[$key];
                    $characteristics->key5 = $request->key5[$key];
                    $characteristics->key6 = $request->key6[$key];
                    $characteristics->key7 = $request->key7[$key];
                    $characteristics->key8 = $request->key8[$key];
                    $characteristics->key9 = $request->key9[$key];
                    $characteristics->key10 = $request->key10[$key];
                    $characteristics->value1 = $request->value1[$key];
                    $characteristics->value2 = $request->value2[$key];
                    $characteristics->value3 = $request->value3[$key];
                    $characteristics->value4 = $request->value4[$key];
                    $characteristics->value5 = $request->value5[$key];
                    $characteristics->value6 = $request->value6[$key];
                    $characteristics->value7 = $request->value7[$key];
                    $characteristics->value8 = $request->value8[$key];
                    $characteristics->value9 = $request->value9[$key];
                    $characteristics->value10 = $request->value10[$key];
                    $characteristics->save();
                }
            }
        }catch(\Throwable $th){
            return 'Ошибка сервера!';
        }
        return redirect()->back();
    } 

    public function category() {
        return view('category');
    } 
    
    public function category_new(Request $request) {
        try{
            $category = new category();
            $category->name_category = $request->name_category;
            $category->save();
        }catch(\Throwable $th){
            return 'Ошибка сервера!';
        }
        return redirect()->back();
    } 

    public function partner() {
        return view('partner');
    } 
    
    public function slider(){
        return view('slider');
    }

    public function shades(){
        return view('shades');
    }
    
    public function partner_new(Request $request) {
        try{
            Storage::putFileAs('partner', $request->img_partner, $request->file('img_partner')->getClientOriginalName());
            Storage::putFileAs('banner_of_partner', $request->bg_img, $request->file('bg_img')->getClientOriginalName());
            $partner = new partner();
            $partner->img_partner = $request->img_partner->getClientOriginalName();
            $partner->bg_img = $request->bg_img->getClientOriginalName();
            $partner->name_partner = $request->name_partner;
            $partner->text_partner = $request->text_partner;
            $partner->mini_title = $request->mini_title;
            $partner->mini_subtitle = $request->mini_subtitle;
            $partner->link_partner = $request->link_partner;
            $partner->save();
        }catch(\Throwable $th){
            return 'Ошибка сервера!';
        }
        return redirect()->back();
    } 

    public function slider_all() {
        $sliders = slider::All();
        return view('all/sliders', compact('sliders'));
    }

    public function shades_all() {
        $shades = shades::All();
        return view('all/shades', compact('shades'));
    }

    public function slider_edit(Request $request, $id)  {
        $paslider_old = slider::where('id_slider', '=', $id)->get();
        empty($request->img_slider) ? $img_slider = $paslider_old[0]['img_slider'] :  $img_slider = $request->file('img_slider')->store('','carusel');
        empty($request->img_slider_mobile) ? $img_slider_mobile = $paslider_old[0]['img_slider_mobile'] : $img_slider_mobile = $request->file('img_slider_mobile')->store('','carusel');
        $title_slider = $request->title_slider;
        $subtitle_slider = $request->subtitle_slider;
        $link_slider = $request->link_slider;
        $slider = DB::select("update sliders
                    SET img_slider = :img_slider,
                    img_slider_mobile = :img_slider_mobile,
                    title_slider = :title_slider,
                    subtitle_slider = :subtitle_slider,
                    link_slider = :link_slider
                    WHERE id_slider = :id", [$img_slider, $img_slider_mobile, $title_slider, $subtitle_slider, $link_slider, $id]);
        return redirect()->back();
    }

    public function shades_edit(Request $request, $id){
        foreach ($request->shades as $key => $value) {
            if(!shades_color::where('color_id', $value)->where('shades_id', $id)->exists()){
                $shades_color = new shades_color();
                $shades_color->color_id = $value;
                $shades_color->shades_id = $id;
                $shades_color->save();
            }
        }
        $name = $request->name;
        $color_hash = $request->color_hash;
        $shades = DB::select("update shades
                    SET name = :name,
                    color_hash = :color_hash
                    WHERE id_shades = :id", [$name, $color_hash, $id]);
        return redirect()->back();
    }

    public function slider_del($id){
        $slider =  DB::select("delete from sliders WHERE id_slider = :id", [$id]);
        return redirect()->back();
    }

    public function shades_del($id) {
        $shades =  DB::select("delete from shades WHERE id_shades = :id", [$id]);
        return redirect()->back();
    }

    public function slider_open_edit($id)  {
        $slider = slider::where('id_slider', '=', $id)->get();
        return view('edit/slider', compact('slider'));
    }

    public function shades_open_edit($id){
        $shades = shades::where('id_shades', '=', $id)->get();
        $shades_color = shades_color::where('shades_id', $shades[0]['id_shades'])->get();
        $color = color::All();
        return view('edit/shades', compact('shades', 'shades_color', 'color'));
    }

    public function slider_new(Request $request) {
        try{
            $slider = new slider();
            if(!empty($request->img_slider)){
                $path = $request->file('img_slider')->store('','carusel');
                $slider->img_slider = $path;
            } 
            if(!empty($request->img_slider_mobile)){
                $path = $request->file('img_slider_mobile')->store('','carusel');
                $slider->img_slider_mobile = $path;
            } 
            $slider->title_slider = $request->title_slider;
            $slider->subtitle_slider = $request->subtitle_slider;
            $slider->link_slider = $request->link_slider;
            $slider->save();
        }catch(\Throwable $th){
            return 'Ошибка сервера!';
        }
        return redirect()->back();
    } 

    public function service(){
        return view('service');
    }

    public function stock(){
        return view('stock');
    }

    public function stock_new(Request $request) {
        try{
            $stock = new stock();
            if(!empty($request->img_stock)){
                $path = $request->file('img_stock')->store('','stock');
                $stock->img_stock = $path;
            } 
            $stock->title_stock  = $request->title_stock ;
            $stock->subtitle_stock = $request->subtitle_stock;
            $stock->text_stock = $request->text_stock;
            $stock->save();
        }catch(\Throwable $th){
            return 'Ошибка сервера!';
        }
        return redirect()->back();
    } 

    public function service_new(Request $request) {
        try{
            $service = new service();
            if(!empty($request->img_service )){
                $path = $request->file('img_service')->store('','service');
                $service->img_service = $path;
            } 
            $service->title_service = $request->title_service;
            $service->subtitle_service = $request->subtitle_service;
            $service->price = $request->price;
            $service->text = $request->text;
            $service->save();
        }catch(\Throwable $th){
            return 'Ошибка сервера!';
        }
        return redirect()->back();
    } 

    public function service_all() {
        $service = service::All();
        return view('all/service', compact('service'));
    }

    public function stock_all() {
        $stock = stock::All();
        return view('all/stock', compact('stock'));
    }

    public function service_del($id)   {
        $services =  DB::select("delete from services WHERE id_service = :id", [$id]);
        return redirect()->back();
    }

    public function stock_del($id)   {
        $stocks =  DB::select("delete from stocks WHERE id_stock = :id", [$id]);
        return redirect()->back();
    }

    public function stock_open_edit($id)  {
        $stock = stock::where('id_stock', $id)->get();
        return view('edit/stock', compact('stock'));
    }

    public function stock_edit(Request $request, $id)   {
        $stock_old = stock::where('id_stock', '=', $id)->first();
        empty($request->img_stock) ? $img_stock = $stock_old['img_stock'] : $img_stock = $request->file('img_stock')->store('','stock');
        $title_stock = $request->title_stock;
        $subtitle_stock = $request->subtitle_stock;
        $text_stock = $request->text_stock;
        $stocks = DB::select("update stocks
                    SET img_stock = :img_stock,
                    title_stock = :title_stock,
                    subtitle_stock = :subtitle_stock,
                    text_stock = :text_stock
                    WHERE id_stock = :id", [$img_stock, $title_stock, $subtitle_stock, $text_stock, $id]);
        return redirect()->back();
    }

    public function service_open_edit($id)   {
        $service = service::where('id_service', $id)->first();
        $fotos = service_foto::where('id_service', $id)->get();
        return view('edit/service', compact('service', 'fotos'));
    }

    public function service_edit(Request $request, $id) {
        $service_old = service::where('id_service', '=', $id)->first();
        empty($request->img_service) ? $img_service = $service_old['img_service'] : $img_service = $request->file('img_service')->store('','service');
        $title_service = $request->title_service;
        $subtitle_service = $request->subtitle_service;
        $price = $request->price;
        $text = $request->text;
        $stocks = DB::select("update services
                    SET img_service = :img_service,
                    title_service = :title_service,
                    subtitle_service = :subtitle_service,
                    price = :price,
                    text = :text
                    WHERE id_service = :id", [$img_service, $title_service, $subtitle_service, $price, $text, $id]);
        return redirect()->back();
    }
}
