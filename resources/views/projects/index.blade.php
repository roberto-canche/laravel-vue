@extends('layouts.app')

@section('content')
    <projects :projects="{{ json_encode( $projects ) }}"></projects>
@endsection