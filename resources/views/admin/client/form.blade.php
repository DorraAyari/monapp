@csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nom">nom</label>
                        <input type="text" name="nom" id="nom" value="{{ $client->nom ?? old('nom') }}" class="form-control @error('nom') is-invalid @enderror "placeholder="nom goes here">
                        @error('nom')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="prenom">prenom</label>
                        <input type="text" name="prenom" id="prenom"  value="{{$client->prenom ?? old('prenom') }}"class="form-control @error('prenom') is-invalid @enderror" placeholder="prenom goes here">
                        @error('prenom')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="telephone">telephone</label>
                        <input type="text" name="telephone" id="telephone"  value="{{$client->telephone ?? old('telephone') }}"class="form-control @error('telephone') is-invalid @enderror" placeholder="+21612345678">
                        @error('telephone')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email"  value="{{$client->email ?? old('email') }}"id="email" class="form-control @error('email') is-invalid @enderror " placeholder="person@example.com">
                        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
            </div>
            <div class="form-group">
              <label for="adresse">Adress</label>
              <input type="text" name="adresse" id="adresse"  value="{{$client->adresse ?? old('adresse') }}" class="form-control @error('adresse') is-invalid @enderror" placeholder="adresse goes here">
              @error('adresse')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="row">
                <div class="col"><button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Save</button></div>
                <div class="col"><button type="reset" class="btn btn-block btn-outline-secondary"><i class="fas fa-window-close"></i> Cancel</button></div>
            </div>
