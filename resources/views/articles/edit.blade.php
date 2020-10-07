@extends ('layout')

@section ('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection


@section ('content')

<div id="wrapper">
	<div id="page" class="container">
      
        <h1 class="title">Update Article</h1>

        <form method="POST" action="/articles/{{ $article->id }}">
            @csrf
            @method('PUT')
                <div class="field">
                    <label class="label" for="title">Title</label>

                    <div class="control">
                        <input class="input" type="text"  name="title" id="title" value="{{ $article->title }}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="article_summary">Summary</label>

                    <div class="control">
                        <textarea class="textarea" name="article_summary" id="excerpt">{{ $article->article_summary }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="article_body">Body</label>

                    <div class="control">
                        <textarea class="textarea" name="article_body" id="body">{{ $article->article_body }}</textarea>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>

	</div>
</div>

@endsection