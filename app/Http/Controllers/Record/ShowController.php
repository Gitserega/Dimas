<?php

namespace App\Http\Controllers\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ShowController extends BaseController
{
    public function __invoke($id){
        $data = $this->service->show($id);
        return view('records.show', $data);
    }
}
