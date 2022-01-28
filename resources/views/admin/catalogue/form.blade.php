@csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">nom</label>
                        <input type="text" name="name" id="name" value="{{ $catalogue->name ?? old('name') }}" class="form-control @error('name ') is-invalid @enderror" placeholder="nom goes here">
                        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text" name="description" id="description"  value="{{$catalogue->description?? old('description') }}"class="form-control @error('description') is-invalid @enderror" placeholder="description goes here">
                        @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col"><button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-save"></i> Save</button></div>
                <div class="col"><button type="reset" class="btn btn-block btn-outline-secondary"><i class="fas fa-window-close"></i> Cancel</button></div>
            </div>
