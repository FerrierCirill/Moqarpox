<div id="modal_user_modification" class="modal modal-fixed-footer">
    <form method="POST" action="{{ route('user_edit') }}">
        @csrf
        <div class="modal-content ">
            <h4>Modifier vos informations</h4>
            <div class="row p-3">
                <div class="input-field col s12 m4">
                    <label>Nom</label>
                    <input  class="validate"
                            type = "text"
                            name = "second_name"
                            value="{{$user->second_name}}">

                    @if($errors->has('second_name'))
                        <p>{{$errors->first('second_name')}}</p>
                    @endif
                </div>

                <div class="input-field col s12 m4">
                    <label>Prénom</label>
                    <input  class="validate"
                            type = "text"
                            name = "first_name"
                            value="{{$user->first_name}}">

                    @if($errors->has('first_name'))
                        <p>{{$errors->first('first_name')}}</p>
                    @endif
                </div>

                <div class="input-field col s12 m4">
                    <select id="civility" name="civility" class="form-control @error('civility') is-invalid @enderror" value="{{ old('civility') }}">
                        <option value="" disabled selected>Sélectionnez votre genre</option>
                        <option value="man" @if($user->civility == 'man') selected @endif>Monsieur</option>
                        <option value="woman" @if($user->civility == 'woman') selected @endif>Madame</option>
                        <option value="other" @if($user->civility == 'other') selected @endif>Autre</option>
                    </select>
                    <label>Genre</label>
                </div>

                <div class="input-field col s12 m6">
                    <label>Téléphone</label>
                    <input  class="validate"
                            type = "text"
                            name = "phone"
                            value="{{$user->phone}}">

                    @if($errors->has('phone'))
                        <p>{{$errors->first('phone')}}</p>
                    @endif
                </div>

                @if($user->provider == null)
                    <div class="input-field col s12 m6">
                        <label>Adresse E-mail</label>
                        <input  class="validate"
                                type = "email"
                                name = "email"
                                value="{{$user->email}}">

                        @if($errors->has('email'))
                            <p>{{$errors->first('email')}}</p>
                        @endif
                    </div>

                    <div class="input-field col s12 m6">
                        <label>Saisissez votre mot de passe pour valider</label>
                        <input  class="validate"
                                type = "password"
                                name = "password"
                                required>
                        @if($errors->has('password'))
                            <p>{{$errors->first('password')}}</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Annulé</a>
            <button type="submit" class="btn mb-2 right">Sauvegarder <i class="fas fa-save"></i></button>
        </div>
    </form>
</div>
