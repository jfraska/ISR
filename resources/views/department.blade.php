@extends('layouts.app')

@section('title', $department->title)

@section('content')
    <div class="px-20 py-28">
        <div class="w-[470px] h-fit">
            <h1 class="text-2xl font-bold">{{ $department->title }}</h1>
        </div>
        <img class="min-w-80 min-h-48 rounded-t-lg" src="{{ $department->getFirstMediaUrl() }}" alt="content" />
    </div>
@endsection