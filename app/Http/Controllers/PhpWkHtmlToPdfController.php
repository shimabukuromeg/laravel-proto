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


        $aaa = 'テスト';
        $html = <<<EOF
            <!DOCTYPE html>
            <html>
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                </head>
                <style>
                body {
                    padding: 7px;
                    font-family: "PAexGothic", "IPAexゴシック";
                }
                </style>
                <body>
                    <div>
                        <p>PDF化のテストです。</p>
                        <p>あいうえお</p>
                        <p>$aaa</p>
                    </div>
                </body>
            </html>
EOF;

        $pdf->addPage($html);

        // Save the PDF
        if (!$pdf->saveAs(storage_path('app/public') . '/hello.pdf')) {
            $error = $pdf->getError();
            dd($error);
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
