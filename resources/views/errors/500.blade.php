@extends('errors::illustrated-layout')

@section('code', '500 😭')

@section('title', __('Server Error'))

@section('image')

<div style="background-image: url('/images/server500.svg');" class="absolute pin bg-no-repeat md:bg-left lg:bg-center">
</div>

@endsection

@section('message', __('Something has gone wrong'))
