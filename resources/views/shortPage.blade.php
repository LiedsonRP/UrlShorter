@extends('layouts.main')

@section('content')
<main>
    <h1 id="short-title">ENCURTE SEU LINK</h1>

    <form action={{route("form.short")}} method="POST" id="inputUrl">
        @csrf
        <input type="text" name="url" placeholder="Digite um link" required/>
        <button type="submit">Encurtar Link</button>
    </form>
</main>
@endsection