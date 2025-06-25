<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Place;
use App\Models\Provider\Trip;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->type ?? 'comment';
        $typeAr = $type == 'comment'? 'تعليقات' : 'شكاوى';
        $commentedType = $request->commented_type??'all';
        $comments = Comment::where('type' , $type)
        ->when($commentedType != 'all' , function($q) use ($commentedType){ 
            return  $q->where('commented_type' , $commentedType);
        })
        ->get();
        return  view('dashboard.comments.index', compact('comments'  , 'type', 'typeAr' , 'commentedType'));
    }
    
}
