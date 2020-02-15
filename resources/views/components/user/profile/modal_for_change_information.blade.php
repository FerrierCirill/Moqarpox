<div id="modal_user_modification" class="modal modal-fixed-footer"> 
    <form action="{-- TODO --}">
        <div class="modal-content ">
            <h4>Modifier vos informations</h4>
            <div class="row p-3">
                <div class="input-field col s12 m12">
                    <select id="civility" class="form-control @error('civility') is-invalid @enderror" value="{{ old('civility') }}">
                        <option value="" disabled selected>Sélectionnez votre genre</option>
                        <option value="man">Monsieur</option>
                        <option value="woman">Madame</option>
                        <option value="else">Autre</option>
                    </select>
                    <label>Genre</label>
                </div>

                <div class="input-field col s12 m12">
                    <label>Téléphone</label>
                    <input  class="validate"
                            type = "text" 
                            name = "phone"
                            value="{{$user->phone}}">
                    
                    @if($errors->has('phone'))
                        <p>{{$errors->first('phone')}}</p>
                    @endif
                </div>

                <div class="input-field col s6 m6">
                    <label>Mot de passe</label>
                    <input  class="validate"
                            type = "text" 
                            name = "password">
                    @if($errors->has('password'))
                        <p>{{$errors->first('password')}}</p>
                    @endif
                </div>

                <div class="input-field col s6 m6">
                    <label for="verif_password">Retapez votre mot de passe</label>
                    <input id="verif_password" type="password" class="validate">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Annulé</a>
            <button type="submit" class="btn mb-2 right">Sauvegardé <i class="fas fa-save"></i></button>
        </div>
    </form>
</div>