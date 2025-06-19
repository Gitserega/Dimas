<?php

namespace App\Http\Controllers\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Record\FindRequest;

class FindController extends BaseController
{
    public function __invoke(FindRequest $request){
        $data = $request->validated();
        $user = $this->service->find($data);
        return redirect()->route('records.show', $user->id);
    }
}
