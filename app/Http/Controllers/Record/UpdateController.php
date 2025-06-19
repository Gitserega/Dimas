<?php

namespace App\Http\Controllers\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Record\UpdateRequest;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, $id){
        $dataUser = $request->validated();
        $dataPet = $request->validated();
        $dataApp = $request->validated();
        $user = $this->service->update($dataUser, $dataPet, $dataApp, $id);
       

        return redirect()->route('records.show', $user->id);
  
    }
}
