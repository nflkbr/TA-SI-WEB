<?php
// app/Http/Controllers/User/HomeController.php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->get();
        return view('user.home', compact('products'));
    }
}