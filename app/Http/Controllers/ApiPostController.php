<?php
    
    namespace App\Http\Controllers;
    
    use App\Http\Resources\PostResource;
    use App\Models\Post;
    use Illuminate\Http\Request;
    
    class ApiPostController extends Controller
    {
        
        public function index()
        {
            $posts = Post::paginate(20);
            
            // response()->json($posts);
            return PostResource::collection($posts);
        }
        
        public function store(Request $request)
        {
            $request->validate([
                'title'       => 'required|string', 'body' => 'required|string',
                'category_id' => 'required|exists:categories,id', 'author_id' => 'required|exists:users,id',
            ]);
            
            $post = Post::create($request->all());
            
            return new PostResource($post);
        }
        
        public function show($id)
        {
            // response()->json(Post::find($id));
            return new PostResource(Post::find($id));
        }
        
    }