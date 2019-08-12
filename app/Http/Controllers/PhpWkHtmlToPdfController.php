<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mikehaertl\wkhtmlto\Pdf;

class PhpWkHtmlToPdfController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pdf = new Pdf([

            // バイナリの位置とエンコード形式
            'binary' => '/usr/bin/wkhtmltopdf',
            'encoding' => 'utf-8',

            // 以下の指定があるとPDFをページ端まで利用できる
            'margin-top' => 0,
            'margin-right' => 0,
            'margin-bottom' => 0,
            'margin-left' => 0,
            'no-outline',

        ]);


        $title = 'テスト著作物';
        $author_name = '山田太郎';
        $params = ["title"=> $title, "author_name" => $author_name];
        $html = file_get_contents(storage_path('template/sample.html'));

        foreach($params as $key=>$value) {
            $html = str_replace("{".$key."}", $value, $html);
        }

        $pdf->addPage($html);


        // Save the PDF
        if (!$pdf->saveAs(storage_path('app/public') . '/hello.pdf')) {
            $error = $pdf->getError();
            // ... handle error here
        }

        return view('phpwkhtmltopdf');
    }

    public function download()
    {
        $path = storage_path('app/public' . '/hello.pdf');
        return response()->file($path);
    }
}
