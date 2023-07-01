<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Post;
    use Illuminate\Http\Request;
    
    class PostCommentController extends Controller
    {
        
        public function store(Request $request, Post $post)
        {
            $request->validate([
                'body' => 'string|required'
            ]);
            
            $post->comments()->create([
                'body' => $request->body
            ]);
            
            return back();
        }
        
    }