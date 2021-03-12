@extends('errors::illustrated-layout')

@section('code', '404 😭')

@section('title', __('Forbidden'))

@section('image')

<div style="background-image: url('/images/401page.svg');" class="absolute pin bg-no-repeat md:bg-left lg:bg-center">
</div>

@endsection

@section('message', __('Sorry, the page you looking for cannot be found'))
