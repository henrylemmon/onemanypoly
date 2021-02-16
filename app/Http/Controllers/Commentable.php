<?php

namespace App\Http\Controllers;

trait Commentable
{
    public function storeComment($id)
    {
        if ($model = $this->model::find($id)) {
            $model->comments()->create(
                request()->validate([
                    'body' => 'required',
                ])
            );

            return back();
        }

        return back()->with('comment-status', 'What are you doing?');
    }
}
