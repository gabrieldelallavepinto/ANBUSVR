@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        {{ $project->name }}
    </div>
    <div class="row">
        @foreach($items as $item)
            {{ $item->name }}
        @endforeach
    </div>
</div>

@endsection

