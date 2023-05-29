<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSettingController extends BaseController
{
    //
    public function index()
    {
        $this->setPageFile('Settings', 'Manage Settings');
        return view('admin.settings.index');
    }

    public function update(Request $request)
    {
        
    }
}
