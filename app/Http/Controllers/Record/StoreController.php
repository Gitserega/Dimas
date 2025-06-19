<?php

namespace App\Http\Controllers\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Record\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request){
        $datau = $request->validated();    
        $datap = $request->validated();
        $dataa = $request->validated();
        $this->service->store($datau, $datap, $dataa);
        
        return redirect()->route('main.index');
    }
}
