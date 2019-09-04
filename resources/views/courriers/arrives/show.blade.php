@extends('layout.default') 


@section('content')
<div class="container">
   
    <form method="POST" action="#" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" placeholder="Votre titre..."
                id="title" value="{{ old('title') }}">
            <div class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
        </div>
        <div class="form-group">
                <label for="content">Message</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" rows="7" name="content" id="textarea"></textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('content') }}
                </div>
            </div>            
        <input class="btn btn-outline-primary" type="submit" value="Poster mon article">
        </form>

</div>

@endsection

