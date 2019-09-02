<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\MyService;
use App\Person;
use App\Jobs\MyJob;

class HelloController extends Controller
{
    public function index()
    {
        MyJob::dispatch();
        $msg = 'show people record.';
        $result = Person::get();

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);

    }
}
