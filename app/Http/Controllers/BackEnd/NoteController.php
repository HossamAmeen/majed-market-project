<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Note};
use Auth;
class NoteController extends BackEndController
{
    public function __construct(Note $model)
    {
        parent::__construct($model);
    }
    public function store(Request $request){

        $requestArray = $request->all();
        $requestArray['user_id'] = Auth::user()->id;
        $this->model->create($requestArray);
        session()->flash('action', 'تم الاضافه بنجاح');

        return redirect()->route($this->getClassNameFromModel().'.index');
    }
}
