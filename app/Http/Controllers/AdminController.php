<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\File;
use App\Models\Tour;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    
    public function admin(Request $request)
    {
        /** @var User $user */
        //$user = \Auth::user();

        //$users = User::all();
        // $status = rand(-1, 3) ? 'danger' : 'success';
        //   $request->session()->flash('message', [
        //    'status' => $status,
        //     'message' => 'Task was successful!'
        //  ]);

        return view('admin/main');
    }
    public function Tours (Request $request)
    {
        return view('admin/addtour');
    }
    public  function addTours (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nameTour' => 'required|unique:tours,name',
            'slug' => 'required|unique:tours,slug',
            'price' => 'required|regex:/^[0-9]*[.,]?[0-9]+$/',
            'start' => 'required|regex:/^[0-9]+$/',
            'duration' => 'required|regex:/^[0-9]+$/',
            'desc' => 'required',
            'smallDesc' => 'required'
        ], [
            'unique' => 'Такое имя уже существует',
            'required' => 'Вы не заполнили обязательное поле!',
            'regex' => 'Поле должно быть числовым'
        ]);
       if ($validator->fails()) {
           return redirect('/admin/tours')->withErrors($validator);
       }
        if(!$request->viewed) $request->viewed = 0;
        if($request->viewed) $request->viewed = 1;
            //заносим в базу новый тур
        $tour = new Tour;
        $tour->name = $request->nameTour;
        $tour->price = (double)$request->price;
        $tour->description = $request->desc;
        $tour->description_tour_way = $request->smallDesc;
        $tour->duration = $request->duration;
        $tour->slug = $request->slug;
        $tour->start_tour = $request->start;
        $tour->viewed = $request->viewed;
        $tour->language_id = 1;
        $tour->save();
        $y = 0;
        foreach ($request->images as $image){
            //получаем данные картинки
            $text = explode("/", $image->getClientMimeType());
            $text = end($text);
            $name = time() . '_' . md5($image->getClientOriginalName()) . ".{$text}";
            $directory = $request->nameTour;
            $path  = Storage::disk('public')->putFileAs($directory, $image, $name);
            // $image->move(public_path('\imageTour'.$directory), $name);
            $alt = $request->alt[$y];
            $title = $request->title[$y];
            if($request->imagePriority == $y) {
                $mainImage = 1;
            }
            else {
                $mainImage = 0;
            }
            //заносим картинки в базу
            $i = new Image();
            $i->img = $path;
            $i->name = $name;
            $i->alt = $alt;
            $i->title = $title;
            $i->tours_id = $tour->id;
            $i->imagePriority = $mainImage;
            $i->save();
            $y++;
        }
        return redirect()->back();
    }
    public function allTours(){
        $images = Image::all();
        $tours = Tour::latest('id')->get();
        return view('admin/viewtour')->with(['tours'=>$tours, 'images'=>$images]);
    }
    public function deletetour($id){
        $tour = Tour::find($id);
        Storage::disk('public')->deleteDirectory($tour->name);
        $tour->delete();
        return redirect()->back();
    }
    public function editTours($id)
    {
        $tours = Tour::find($id);
        return view('admin/edittour')->with(['tour'=>$tours]);
    }
    public function saveEditTour(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nameTour' => 'required',
            'slug' => 'required',
            'price' => 'required|regex:/^[0-9]*[.,]?[0-9]+$/',
            'start' => 'required|regex:/^[0-9]+$/',
            'duration' => 'required|regex:/^[0-9]+$/',
            'desc' => 'required',
            'smallDesc' => 'required'
        ], [
            'required' => 'Вы не заполнили обязательное поле!',
            'regex' => 'Поле должно быть числовым'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/tours/edit_tours/'.$request->idTour)->withErrors($validator);
        }
        $tour = Tour::find($request->idTour);
        if(!$request->viewed) $request->viewed = 0;
        if($request->viewed) $request->viewed = 1;
        if($request->images) {
            $y = 0;
            foreach ($request->images as $image){
                //Если пользователь редактировал и картинки
                //делаем проверку редактировал ли пользователь ту картинку, которая уже есть
                if(isset($request->images[$y])) {
                    if(isset($tour->images[$y])) {
                        Storage::disk('public')->delete($tour->images[$y]->url);
                        $tour->images[$y]->delete();
                    }
                }
                $text = explode("/", $image->getClientMimeType());
                $text = end($text);
                $name = time() . '_' . md5($image->getClientOriginalName()) . ".{$text}";
                $directory = $request->nameTour;
                $path  = Storage::disk('public')->putFileAs($directory, $image, $name);
                // $image->move(public_path('\imageTour'.$directory), $name);
                $alt = $request->alt[$y];
                $title = $request->title[$y];
                if($request->imagePriority == $y) {
                    $mainImage = 1;
                }
                else {
                    $mainImage = 0;
                }
                //заносим картинки в базу
                $i = new Image();
                $i->img = $path;
                $i->name = $name;
                $i->tours_id = $request->idTour;
                $i->alt = $alt;
                $i->title = $title;
                $i->imagePriority = $mainImage;
                $i->save();
                $y++;
            }
        } else {
            //Если пользователь редактировал alt, title, mainImage
            for ($i = 0; $i < 4; $i++) {
                if(isset($request->idImage[$i])) {
                    if($request->imagePriority == $i) {
                        $mainImage = 1;
                    }
                    else {
                        $mainImage = 0;
                    }
                    $alt = $request->alt[$i];
                    $title = $request->title[$i];
                    Image::where('id',$request->idImage[$i])->update([
                        'alt' => $alt,
                        'title' => $title,
                        'tours_id' => $request->idTour,
                        'imagePriority' => $mainImage
                    ]);
                }
            }
        }
        Tour::where('id',$request->idTour)->update([
            'name' => $request->nameTour,
            'price' => $request->price,
            'description' => $request->nameTour,
            'description_tour_way' => $request->smallDesc,
            'duration' => $request->duration,
            'slug' => $request->slug,
            'start_tour' => $request->start,
            'viewed' => $request->viewed,
            'language_id' => 1,
        ]);
       return redirect('/admin/all_tours');
    }
}
