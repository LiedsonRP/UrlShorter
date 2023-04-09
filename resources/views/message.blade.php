@extends("layouts.main")

@section("content")
    <main class="message-box"> 
        <img src={{asset('/images/error_icon.svg')}}>
        <p>{{session()->get('error')}}<p>                            
        <button class="back-button">Voltar</button>
    </main>    
@endsection