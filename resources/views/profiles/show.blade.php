@extends('layout.default')

@section('content')
<div class="container">
    <div class="row mt-4">
       <div class="col-4">
            <img src="#" 
            class="rounded-circle"/>
       </div>
       <div class="col-8">
            <div class="d-flex align-items-baseline">
                <div class="h4 mr-3 pt-2">{{ $user->username }}</div>
                <button class="btn btn-sm btn-primary">{{ __("S'abonner") }}</button>
            </div>
            <div class="d-flex mt-3">
                <div class="mr-3"><strong></strong></div>
                <div class="mr-3"><strong></strong></div>
                <div class="mr-3"><strong></strong></div>
            </div>
            <div class="mt-3">
                <div class="mr-3">{{ $user->profile->titre }}</div>
                <div class="mr-3">{{ $user->profile->description }}</div>
                <a href="{{ $user->profile->titre }}">{{ $user->profile->url }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
