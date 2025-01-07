<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $groupedOptions = session('groupedOptions');
        $userSpace = session('userSpace');
        $completeName = session('complete_name');

        // return $userSpace;

        return view(
            'welcome',
            [
                'groupedOptions' => $groupedOptions,
                'userSpace' => $userSpace,
                'completeName' => $completeName,
            ]
        );
      
    }
}
