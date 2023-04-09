@extends("layouts.main")

@section("content")
    <main class="message-box"> 
        <h1>NOVA URL</h1>
            
        <div id="copy-area" class="message">
            <p>{{session()->get("shortUrl")}}<p>                
            <img src={{asset('/images/copy_icon.svg')}}>                
        <div>  
        
    </main>    
@endsection

@push("scripts")
<script src={{asset('/js/copy.js')}}></script>
@endpush