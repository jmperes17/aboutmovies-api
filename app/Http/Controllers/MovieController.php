<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function getMovie(Request $request)
    {
        $movieName = $request->input('movie');

        $response = $response = HTTP::get('http://www.omdbapi.com/?apikey=14b81e46&s=' . $movieName);
        $json =  $response->json();


        if ($json["Response"] == "True") {
            return view('retorno')->with('json', $json);
        } else {
            //return redirect()->back()->with('message', 'DO NOT WORKS!');
            echo "<script>alert('Movie not found!'); window.location = '/';</script>";
        }
    }
}
