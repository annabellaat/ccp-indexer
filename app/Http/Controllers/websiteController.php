<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Collection;
use App\Models\Banner;

class websiteController extends Controller
{

  public function homepage()
  {
    $collections = Collection::all();
    $banners = Banner::all()->where('is_active');

    return view('home', compact('collections','banners'));
  }
}
