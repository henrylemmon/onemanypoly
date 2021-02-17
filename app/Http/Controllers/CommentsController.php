<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store($model)
    {
        $model->comments()->create(request()->validate([
            'body' => 'required',
        ]));

        return back();
    }
}
