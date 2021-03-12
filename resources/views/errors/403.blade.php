@extends('errors::illustrated-layout')

@section('code', '403 😭')

@section('title', __('Forbidden'))

@section('image')

<div style="background-image: url('/images/403page.png');" class="absolute pin bg-no-repeat md:bg-left lg:bg-center">
</div>

@endsection

@section('message', __('Sorry, you dont have sufficient permissions to access this section'))
