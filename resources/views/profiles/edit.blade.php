@extends('layout.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier mon profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profiles.update', ['$user' => $user]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                        <label for="titre">Titre</label>                            
                            <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre') ?? $user->profile->titre }}" autocomplete="titre" autofocus>
                           
                            @error('titre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div> 
                        <div class="form-group">
                            <label for="description">Description</label>                            
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus>{{ old('description') ?? $user->profile->description }}
                                </textarea>
                               
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                            </div> 
                            <div class="form-group">
                                <label for="url">URL</label>                            
                                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>
                                   
                                    @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
        
                                </div> 

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Chisir une image...</label>                                

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">
                           Modifier mon profile
                        </button>
                          
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
