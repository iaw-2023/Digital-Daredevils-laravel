@extends('layouts.app')

@section('content')
    <iframe src="{{ url('dist/index.html') }}" style="width: 100%; height: 100vh; border: none;"></iframe>
@endsection
