<?php

namespace Syfg\Http\Controllers;

use Illuminate\Http\Request;

use Syfg\Http\Requests;
use Syfg\Http\Controllers\Controller;



class AdminController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index()
    {
        return view('admin/dashboard');
    }
    public function translate()
    {
        return view('admin/translate');
    }
    public function drive()
    {
        return view('admin/drive');
    }
    public function postUpload()
    {
        return 'test upload file';
    }
}
