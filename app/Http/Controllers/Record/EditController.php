<?php

namespace App\Http\Controllers\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EditController extends BaseController
{
    public function __invoke($id){
        $data = $this->service->edit($id);
       
        return view('records.edit', $data);
    }
}
