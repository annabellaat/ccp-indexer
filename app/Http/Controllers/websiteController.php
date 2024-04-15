<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Collection;

class websiteController extends Controller
{
  public function homepage()
  {
    $collections = Collection::all();

    return view('home', compact('collections'));
  }
}
