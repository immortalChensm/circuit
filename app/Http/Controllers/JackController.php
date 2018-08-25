<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use Oldshiji\JackTest\Test;

class JackController extends Controller
{
    public function index()
    {
        $test = new Test();
        echo $test->get();
    }
}