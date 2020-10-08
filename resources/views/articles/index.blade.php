@extends ('layout')


@section ('content')


<div id="wrapper">
	<div id="page" class="container">
      
		@forelse ($articles as $article)
			<div id="content">
				<a href="{{route('articles.show', $article)}}"><div class="title">
					<h3>{{$article->title}}</h3></div>
					<p>{{$article->article_summary}}</p>
				</a>
			</div>  
		
		@empty 
			<p>No relevant artiles to display.</p>
		@endforelse
	</div>
</div>

@endsection