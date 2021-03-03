@extends('layout')

@section('form')
<h2>修改博客</h2>

<form action="/blogs/{{$blog->id}}" method="post">
@csrf
@method('put')
    <div class="field half first">
        <label >标题</label>
        <input name="title"  type="text" value= "{{ $blog->title }}" >
    </div>
    <div class="field ">
        <label >简介</label>
        <input name="excerpt" type="text" value="{{$blog->excerpt}}">
    </div>
    <div class="field">
        <label >内容</label>
        <textarea name="body" rows="6" value="{{$blog->body}}"></textarea>
    </div>
    <ul class="actions">
        <li><input value="Send Message" class="button alt" type="submit"></li>
    </ul>
    <form action="{{ route('blogs.destroy',$blog->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button  class="btn btn-danger" type="submit">Delete</button>
    </form>
</form>
@endsection