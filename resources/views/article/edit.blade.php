@extends('base')

@section('content')
    <div class="container" style="margin-top: 8rem">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier d'un article</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.update',$article->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Titre</label>

                                <div class="col-md-6">
                                    <input value="{{ $article->title }}" id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="titre" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Sous titre</label>

                                <div class="col-md-6">
                                    <input value="{{ $article->subtile }}" id="subtile" type="text" class="form-control @error('subtile') is-invalid @enderror" name="subtile" value="{{ old('subtitle') }}" autocomplete="subtitle">

                                    @error('subtile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="content" class="col-md-4 col-form-label text-md-end">Content</label>

                                <div class="col-md-6">

                                    <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content"  autocomplete="contenu">
                                        {{ $article->content  }}
                                    </textarea>

                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        envoyer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
