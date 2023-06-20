<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranslationController extends Controller
{

    /**
     * index
     *
     * @param  Request  $request
     */
    public function index(Request $request)
    {
        return view('translation');
    }

    /**
     * translation
     *
     * @param  Request  $request
     */
    public function translation(Request $request)
    {
    }
}