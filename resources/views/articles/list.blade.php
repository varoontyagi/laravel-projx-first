@extends ('layout')


@section ('content')

<div id="wrapper">
	<div id="page" class="container">
      
    @foreach ($articles as $article)
        <div id="content">
			<a href="/articles/{{$article->id}}"><div class="title">
				<h3>{{$article->title}}</h3></div></a>
			<a href="/articles/{{$article->id}}"><p>{{$article->article_summary}}</p></a>
        </div>      
    @endforeach  
		

	</div>
</div>

@endsection