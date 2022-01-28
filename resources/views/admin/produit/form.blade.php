@csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="produits_nom">produits_nom</label>
                        <input type="text" name="produits_nom" id="produits_nom" value="{{ $produit->produits_nom ?? old('produits_nom') }}" class="form-control @error('produits_nom') is-invalid @enderror "placeholder="produits_nom goes here">
                        @error('produits_nom')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pics">pics</label>
                        <input type="text" name="pics" id="pics"  value="{{$produit->pics ?? old('pics') }}"class="form-control @error('pics') is-invalid @enderror" placeholder="pics-url goes here">
                        @error('pics')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="text" name="price" id="price"  value="{{$produit->price ?? old('price') }}"class="form-control @error('price') is-invalid @enderror" placeholder="+21612345678">
                        @error('price')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="produits_description">produits_description</label>
                        <input type="produits_description" name="produits_description"  value="{{$produit->produits_description ?? old('produits_description') }}"id="produits_description" class="form-control @error('produits_description') is-invalid @enderror " placeholder="eexamplee">
                        @error('produits_description')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="email">email prduit</label>
                        <input type="text" name="email" id="description_commande"  value="{{$produit->email?? old('email') }}"class="form-control @error('email') is-invalid @enderror" placeholder="email goes here">
                        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col"><button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Save</button></div>
                <div class="col"><button type="reset" class="btn btn-block btn-outline-secondary"><i class="fas fa-window-close"></i> Cancel</button></div>
            </div>
