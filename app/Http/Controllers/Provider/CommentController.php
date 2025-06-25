<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->type ?? 'comment';        
        $typeAr = $type == 'comment' ? 'تعليقات' : 'شكاوى';

        $currProvider = Auth::user()->provider;
        $comments = Comment::where('type', $type)
        ->where('commented_type' , 'App\Models\Provider\Provider')          
        ->where('commented_id' , $currProvider->id)
            ->get();
            
        return  view('dashboard.comments.index-provider', compact('comments',  'typeAr'));
    }
}
