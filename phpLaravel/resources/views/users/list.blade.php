@extends('layouts.app')
@section('title', 'Page Title')
@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection
@section('content')
    <p>Im a {{ $user }}.</p>
    <p>This is my body content.</p>
@endsection
