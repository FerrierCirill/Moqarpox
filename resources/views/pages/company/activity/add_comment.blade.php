@extends('layouts.app')

{{-- @section('head-needMapScript', 'ON') --}}

@section('content')
<div class="container row">
    <div class="col l6 offset-l3 m8 offset-m2 s10 offset-s1 z-depth-2 mt-3 p-2">
        <div class="row">
            <div class="col s12">
                <h1 class="h2-like m-0 mb-1">Déposer un avis</h1>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('post_add_comment') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-field col s12 m6">
                    <label>Code*</label>
                    <input type="text" class="validate" name="code" required>
                    @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-field col s12 m6">
                    <label>Titre*</label>
                    <input type="text" class="validate" name="title" required>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-field col s12">
                    <p class="range-field">
                        <label>Note*</label>
                        <input type="range" name="note" min="0" max="5" required id="note-input"/>
                    </p>
                    <p id="note-p">Note : 0 / 5</p>
                </div>

                <div class="input-field col s12">
                    <label>Message*</label>
                    <textarea type="text"
                                class="validate materialize-textarea"
                                name="message"
                                required></textarea>

                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col s12">
                        <button class="btn right" style="min-width:65%" type="submit">Déposer</button>
                    </div>
                </div>
            </form>
         </div>
        @if(isset($error))
            <div class="center-align" style="color: red">
                {{$error}}
                <br>
                <a href="https://mouqarpox.neolithic.fr/faq">Voir la FAQ pour plus de détails.</a>
            </div></div>
@endif
</div>

<script>
    document.getElementById('note-input').addEventListener('mousemove', () => {
        document.getElementById('note-p').innerText = `Note : ${document.getElementById('note-input').value} / 5`
    })

    document.getElementById('note-input').addEventListener('change', () => {
        document.getElementById('note-p').innerText = `Note : ${document.getElementById('note-input').value} / 5`
    })
</script>
@endsection
