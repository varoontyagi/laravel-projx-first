@extends ('layout')

@section ('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection


@section ('content')

<div id="wrapper">
	<div id="page" class="container">
      
        <h1 class="title">New Article</h1>

        <form method="POST" action="/articles">
            @csrf
                <div class="field">
                    <label class="label" for="title">Title</label>

                    <div class="control">
                        <input class="input @error('title') is-danger @enderror" type="text"  name="title" id="title" value="{{ old('title') }}">

                        @error('title')
                            <p class="help is-danger"> {{ $errors->first('title') }}</p> 
                        @enderror

                    </div>
                </div>

                <div class="field">
                    <label class="label" for="article_summary">Summary</label>

                    <div class="control">
                        <textarea class="textarea @error('article_summary') is-danger @enderror" name="article_summary" id="article_summary" >{{ old('article_summary') }}</textarea>

                        @error('article_summary')
                            <p class="help is-danger"> {{ $errors->first('article_summary') }}</p> 
                        @enderror                    
                
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="article_body">Body</label>

                    <div class="control">
                        <textarea class="textarea @error('article_body') is-danger @enderror" name="article_body" id="article_body" >{{ old('article_body') }}</textarea>
                        
                        @error('article_body')
                            <p class="help is-danger"> {{ $errors->first('article_body') }}</p> 
                        @enderror     

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