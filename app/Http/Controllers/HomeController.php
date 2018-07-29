<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Tour;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        $tours = Tour::all();

        return view('home', [
            'tours' => $tours,
            'images'=>$images,
        ]);
    }
    public function categoryIndex()
    {
        $categories = Category::all();

        return view('index', [
            'categories' => $categories,
        ]);
    }

    public function categoryDelete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect(route('categories.index'));
    }

    public function category($slug)
    {
        $category = Category::where(['slug' => $slug])->first();

        return view('welcome', [
            'category' => $category,
        ]);
    }

    public function create(Request $request, $slug = null)
    {
        $category = null;
        if ($slug) {
            $category = Category::where(['slug' => $slug])->first();
        }
        return view('create', [
                'category' => $category
            ]
        );
    }

    public function save(Request $request)
    {

        $name = $request->get('name');
        $slug = $request->get('slug');

        $validator = \Validator::make($request->all(), [
            'slug' => 'required|unique:categories,slug',
            'name' => 'required',
        ]);
        //dd($validator->errors());
        if ($validator->fails()) {
            return redirect(route('categories.create'))->withErrors($validator)->withInput();
        }

        $id = $request->get('id');
        if ($id === null) {
            $category = new  Category();
        } else {
            $category = Category::find($id);
        }

        $category->name = $name;
        $category->slug = $slug;
        $category->save();

        return redirect(route('categories.show', ['slug' => $slug]));
    }
    public function viewOneTour($slug)
    {
        $tour = null;
        if ($slug) {
            $tour = Tour::where(['slug' => $slug])->first();
        }

        return view('oneTour', [
                'tour' => $tour
            ]
        );
    }



}
