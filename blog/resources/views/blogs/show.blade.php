@extends('layout')

@section('content')
<section id="post" class="wrapper bg-img" data-bg="{{$blog->bg_img}}">
				<div class="inner">
					<article class="box">
						<header>
							<h2>{{$blog->title}}</h2>
							<p>{{$blog->created_at->format('Y.m.d')}}</p>
						</header>
						<div class="content">
							{!! nl2br($blog->body) !!}
						</div>
						<a href="/blogs/{{$blog->id}}/edit">edit</a>
						<footer>
							<ul class="actions">
                                @if($blog->id > 1)
								<li><a href="/blogs/{{$blog->id-1}}" class="button alt icon fa-chevron-left"><span class="label">Previous</span></a></li>
                                @endif
                                
                                @if($blog->id < 10 )
								<li><a href="/blogs/{{$blog->id+1}}" class="button alt icon fa-chevron-right"><span class="label">Next</span></a></li>
                                @endif
                            </ul>
						</footer>
					</article>
				</div>
			</section>
    @endsection