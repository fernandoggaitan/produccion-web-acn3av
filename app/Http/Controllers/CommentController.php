<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $comments = Comment::select( ['comment', 'user_id'] )->paginate(100);

        return view('comments.index', [
            'comments' => $comments
        ]);

    }

}
