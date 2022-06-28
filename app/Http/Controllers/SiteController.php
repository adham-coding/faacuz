<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function welcome()
    {
        return view('layouts.categories', [
            'collection' => Category::whereState(true)
                ->orderBy('order')
                ->get()
        ]);
    }

    public function category(Request $request)
    {
        $category = Category::whereSlug($request->slug)
            ->whereState(true)
            ->first() ?? abort(404);

        return view('layouts.products', [
            'category' => $category,
            'collection' => Product::whereCategoryId($category->id)
                ->whereState(true)
                ->orderBy('order')
                ->get()
        ]);
    }

    public function product(Request $request)
    {
        $product = Product::whereSlug($request->slug)
            ->whereState(true)
            ->first() ?? abort(404);

        $category = $product->getCategory;

        if ($category->state) {
            $product->increment('hit');

            return view('layouts.product', [
                'category' => $category,
                'item' => $product,
            ]);
        }

        abort(404);
    }

    public function products()
    {
        return view('layouts.products_all', [
            'collection' => Product::whereState(true)
                ->orderBy('order')
                ->get(),
        ]);
    }

    public function about()
    {
        return view('layouts.about', [
            'collection' => About::whereState(true)
                ->orderBy('order')
                ->get()
        ]);
    }

    public function contact()
    {
        return view('layouts.contact', [
            'location' => Contact::find(1)->location
        ]);
    }
}
