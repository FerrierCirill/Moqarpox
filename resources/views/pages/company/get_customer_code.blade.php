@extends('layouts.app')
@section('content')
    <div class="container row">
        <div class="col l6 offset-l3 m8 offset-m2 s10 offset-s1 z-depth-2 mt-3 p-2">
            <div class="row">
                <div class="col s12">
                    <h1 class="h2-like m-0 mb-1">Rembourser une activité</h1>
                </div>
            </div>
            <div class="row">
                <form action="{{ route('user_customer_code_post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-field col s12 m12">
                        <label>Code*</label>
                        <input type="text" class="validate" name="code" required>
                        @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <button class="btn right" style="min-width:65%" type="submit">Rembourser</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
