<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SnappyPdf;

class SnappyPdfController extends Controller
{
    public function index()
    {
        $pdf = SnappyPdf::loadView('pdf_tamplate')->setOption('encoding', 'utf-8');
        return $pdf->inline('thisis.pdf');  //ブラウザ上で開ける
        // return $pdf->download('thisis.pdf'); //こっちにすると直接ダウンロード
    }
}
