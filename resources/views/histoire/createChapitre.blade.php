<form action="{{route('chapitre.store')}}" method="POST">
    {!! csrf_field() !!}
    <input type="hidden" name="histoire_id" value="{{$id}}">
    <div class="text-center" style="margin-top: 2rem">
        <h3>Création d'un chapitre</h3>

    </div>
    <div>

        <label for="titre"><strong>Titre : </strong></label>
        <input type="text" name="titre" id="titre"
               value="{{ old('titre') }}"
               placeholder="Ex : Chap 1 : La rencontre">
    </div>
    <div>
        <label for="titrecout"><strong>Titre court : </strong></label>
        <input type="text" class="form-control" id="titrecout" name="titrecourt"
               value="{{ old('titrecourt') }}">
    </div>
    <div>
        <label for="texte"><strong>Texte : </strong></label>
        <input type="text" name="texte" id="texte"
               value="{{ old('texte') }}"
               placeholder="Le texte lié au chapitre">
    </div>
    <div>
        <label for="media"><strong>Media</strong></label>
        <input type="text" name="media" id="media"
               value="{{ old('media') }}"
               placeholder="Média lié au chapitre">
    </div>
    <div>
        <label for="question"><strong>Question</strong></label>
        <input type="text" name="question" id="question"
               value="{{ old('question') }}"
               placeholder="Question liée au chapitre">
    </div>
    <div>
        <label for="premier"><strong>Premier chapitre?</strong></label>
        <input type="checkbox" name="premier" checked id="premier">
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>
