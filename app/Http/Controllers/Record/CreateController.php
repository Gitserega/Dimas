<?php

namespace App\Http\Controllers\Record;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke(){
        $data = $this->service->create();
        return view('records.create', [
            'groomers' => $data['groomers'],
            'services' => $data['services']
        ]);
    }
}
