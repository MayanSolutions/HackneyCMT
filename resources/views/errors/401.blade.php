@extends('errors::illustrated-layout')

@section('code', '401 😭')

@section('title', __('Not Authorised'))

@section('image')

<div style="background-image: url('/images/401page.png');" class="absolute pin bg-no-repeat md:bg-left lg:bg-center">
</div>

@endsection

@section('message', __('Not authorised to access this application'))
