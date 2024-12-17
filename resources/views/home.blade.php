@extends('layouts.base')

@section('content')
    <div class="container mx-auto">
        <x-posts :posts="$posts" />
    </div>
@endsection
