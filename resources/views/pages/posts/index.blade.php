@extends('layout')
@section('main')
    <div id="modelBox">
        @include('components.uploadform')
    </div>
        
    @include('components.storiescontainer', ['items' => $items])
@endsection