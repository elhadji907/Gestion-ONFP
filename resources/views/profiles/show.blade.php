@extends('layout.default')

@section('content')
<div class="container">
    <div class="row mt-4">
       <div class="col-4 text-center">

            <img src="{{ asset($user->profile->getImage()) }}" class="rounded-circle w-100"/>

           {{--  <img src="{{ asset('storage').'/'.$user->profile->image }}" class="rounded-circle w-100"/> --}}

           <hr class="divider my-0 mt-3">
           <div class="mr-3"><strong>{{ auth::user()->firstname }} {{ auth::user()->name }}</strong></div>

       </div>
       <div class="col-8">
            <div class="d-flex align-items-baseline">
                <div class="h4 mr-3 pt-2">{{ $user->username }}</div>
                <button class="btn btn-sm btn-primary">{{ __("S'abonner") }}</button>
            </div>
            <div class="d-flex mt-3">
                <div class="mr-3"><strong>{{ $user->postes->count() }} </strong> Publication(s)</div>
                <div class="mr-3"><strong>24 </strong> Abonnés</div>
                <div class="mr-3"><strong>56 </strong> Abonnements</div>
            </div>
            
            @can('update', $user->profile)
            <a href="{{ route('profiles.edit', ['username'  => $user->username]) }}" class="btn btn-outline-secondary mt-3">Modifier mon profile</a>             
            @endcan
            
            <div class="mt-3">
                <div class="mr-3">{{ $user->profile->titre }}</div>
                <div class="mr-3">{{ $user->profile->description }}</div>
                <a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a>
            </div>
        </div>
    </div>

    <div class="mt-5 row">
        @foreach ($user->postes as $post)
        <div class="col-4 pb-3">
            <a href="{{ route('postes.show', ['poste' => $post->id ]) }}"><img src="{{ asset('storage').'/'.$post->image }}" class="w-100"/></a>
        </div>            
        @endforeach
    </div>
</div>
@endsection
