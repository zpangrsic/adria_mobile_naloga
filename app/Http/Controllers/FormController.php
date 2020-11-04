<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Returns the view used for Contact Form
     */
    public function index()
    {
        return view('contact-form');
    }
}
