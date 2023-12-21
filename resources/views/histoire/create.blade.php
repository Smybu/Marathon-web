<form action="{{route('histoire.store')}}" method="POST">
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3>Création d'une histoire</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        {{-- la date d'expiration --}}
        <label for="titre"><strong>Titre : </strong></label>
        <input type="text" name="titre" id="titre"
               value="{{ old('titre') }}"
               placeholder="Ex : La balade avec mamie">
    </div>
    <div>
        {{-- la catégorie --}}
        <label for="pitch"><strong>Pitch</strong></label>
        <input type="text" class="form-control" id="pitch" name="pitch"
               value="{{ old('pitch') }}">
    </div>
    <div>
        <label for="photo"><strong>Photo</strong></label>
        <input type="text" name="photo" checked id="photo"
        value="{{ old('photo') }}"
        placeholder="Url de votre photo">
    </div>
    <div>
        <select name="genre">
            @foreach($genres as $genre)
                <option value="{{$genre->id}}">
                    {{$genre->label}}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="active"><strong>Active?</strong></label>
        <input type="checkbox" name="active" checked id="active">
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>
