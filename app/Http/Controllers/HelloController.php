<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\MyService;
use App\Person;
use App\Jobs\MyJob;

class HelloController extends Controller
{
    public function index(Person $person = null)
    {
        if ($person != null)
        {
            MyJob::dispatch($person);
        }
        $msg = 'show people record.';
        $result = Person::get();
        $data = [
            'input' => '',
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
