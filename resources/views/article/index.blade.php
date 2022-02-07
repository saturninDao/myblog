@extends('base')

@section('content')

<div class="mt-5 container">
    @if($message = Session::get('success') )
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1 class="mt-5 display-2">Liste des articles</h1>


    <a class="link-info" href="{{ route('admin.new') }}"> Ajouter un article</a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Sous-titre</th>
            <th scope="col">Content</th>
            <th scope="col">Création</th>
            <th scope="col">Modification</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->subtile }}</td>
                <td>{{ $article->content }}</td>
                <td>{{ $article->format_date() }}</td>
                <td>{{ $article->updated_at }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('admin.edit', ['article'=>$article]) }}">Modifier</a>
                </td>
                <td>
                    <form action="{{ route('admin.destroy', $article->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
</div>

@endsection
