@extends('base')

@section('content')

<div class="mt-5 container">
    <h1 class="mt-5 display-2">Liste des articles</h1>

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
                <td>{{ $article->subtitle }}</td>
                <td>{{ $article->content }}</td>
                <td>{{ $article->format_date() }}</td>
                <td>{{ $article->updated_at }}</td>
                <td>
                    <button type="button" class="btn btn-warning">Modifier</button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger">Supprimer</button>
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
