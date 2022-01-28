@csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="date commande">date commande</label>
                        <input type="text" name="date_commande" id="date_commande" value="{{ $commande->date_commande ?? old('date_commande') }}" class="form-control @error('date_commande') is-invalid @enderror" placeholder="date_commande goes here">
                        @error('date_commande')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="num commande">num commande</label>
                        <input type="text" name="num_commande" id="num_commande"  value="{{$commande->num_commande?? old('num_commande') }}"class="form-control @error('num_commande') is-invalid @enderror" placeholder="num_commande goes here">
                        @error('num_commande')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
            </div>
              <div class="col">
                    <div class="form-group">
                        <label for="prix_commande">prix commande</label>
                        <input type="text" name="prix_commande" id="prix_commande" value="{{ $commande->prix_commande ?? old('prix_commande') }}" class="form-control @error('prix_commande') is-invalid @enderror" placeholder="prix_commande goes here">
                        @error('prix_commande')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="description_commande">description commande</label>
                        <input type="text" name="description_commande" id="description_commande"  value="{{$commande->description_commande?? old('description_commande') }}"class="form-control @error('description_commande') is-invalid @enderror" placeholder="description goes here">
                        @error('description_commande')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col"><button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save">Edit</i> Save</button></div>
                <div class="col"><button type="reset" class="btn btn-block btn-outline-secondary"><i class="fas fa-window-close">Delete</i> Cancel</button></div>
            </div>
