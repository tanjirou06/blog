<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class BlogController extends Controller
{
    public function index ()
    {
        $blogs = Blog::query()->latest()->get();
        return view('homepage',['blogs'=>$blogs]);
    }

    public function show ($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show',['blog' =>$blog]);

    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store()
    {
        request()->validate([
            'title'=>['required','max:20'],
            'excerpt'=>'required',
            'body'=>'required'
        ],['title.required'=>'请输入博客的标题',
            'excerpt.required'=>'请输入博客的摘要',
            'body.required'=>'请输入博客的内容']
        
        );
        $blog = new Blog();
        $blog->title =request('title');
        $blog->excerpt =request('excerpt');
        $blog->body =request('body');
        $blog->bg_img ='banner{{rand(2,5)}}.jpg';
        $blog->save();
        return redirect('/');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blogs.edit',compact('blog'));
    }
    public function update($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title =request('title');
        $blog->excerpt =request('excerpt');
        $blog->body =request('body');
        $blog->save();
        return redirect('/blogs/'.$blog->id);
    }
    public function destroy($id)
    {
        $blog= Blog::find($id);
        $blog->delete();
        return redirect('/');
    }
        
    
}
