<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Category;
    use App\Models\Post;
    use App\Models\User;
    use Illuminate\Http\Request;
    
    class PostController extends Controller
    {
        
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            return view('post.index', [
                'posts' => Post::published()->with(['author', 'category'])->get()
            ]);
        }
        
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            //            dd($request);
            $data = $request->validate([
                'title'       => 'required|string', 'body' => 'required|string',
                'author_id'   => 'required|exists:users,id', 'category_id' => 'required|exists:categories,id'
            ], [
                'title.required'     => 'Naslov je obavezan.', 'body.required' => 'Tekst je obavezan.',
                'author_id.required' => 'Autor je obavezan.', 'category_id.required' => 'Kategorija je obavezna.',
            ]);
            $data['slug'] = $request->title;
            
            $post = Post::create($data);
            
            return to_route('posts.show', $post->id);
        }
        
        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('post.create', [
                'categories' => Category::all(), 'authors' => User::query()->author()->get()
            ]);
        }
        
        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            return view('post.show', ['post' => Post::find($id)]);
        }
        
        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            return view('post.edit', ['post' => Post::find($id), 'categories' => Category::all()]);
        }
        
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $data = $request->validate([
                'title'       => 'string|required', 'body' => 'string|required',
                'category_id' => 'required|exists:categories,id'
            ]);
            
            Post::find($id)->update($data);
            
            return to_route('posts.show', $id);
        }
        
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            Post::find($id)->delete();
            
            return to_route('posts.index');
        }
        
    }