@extends('layouts.app')

@section('title', $page->name)

@push('styles')
    <style rel="stylesheet">{!! $page->css !!}</style>
@endpush

@section('content')
    <x-header></x-header>

    {!! $page->html !!}
@endsection
