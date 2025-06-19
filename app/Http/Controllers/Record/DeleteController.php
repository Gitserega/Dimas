<?php

namespace App\Http\Controllers\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends BaseController
{
    public function __invoke(string $id){
        $this->service->delete($id);
        
        return redirect()->route('main.index');
    }
}
