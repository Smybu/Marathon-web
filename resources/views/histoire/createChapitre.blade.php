<section class="section-createChapitre">
    <form action="{{route('chapitre.store')}}" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="histoire_id" value="{{$id}}">

            <h1 class="titre-createChapitre">Création d'un chapitre</h1>

            <div class="input-enLigne-createChapitre">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" value="{{ old('titre') }}" placeholder="Ex : Chap 1 : La rencontre">
            </div>

            <div class="input-enLigne-createChapitre">
                <label for="titrecout">Titre court</label>
                <input type="text" class="form-control" id="titrecout" name="titrecourt"
                       value="{{ old('titrecourt') }}">
            </div>

            <div class="input-enLigne-createChapitre">
            <label for="texte">Texte</label>
            <input type="text" name="texte" id="texte"
                   value="{{ old('texte') }}"
                   placeholder="Le texte lié au chapitre">
            </div>


        <div class="input-enLigne-createChapitre">
            <label for="media">Media</label>
            <input type="text" name="media" id="media"
                   value="{{ old('media') }}"
                   placeholder="Média lié au chapitre">
        </div>

        <div class="input-enLigne-createChapitre">
            <label for="question">Question</label>
            <input type="text" name="question" id="question"
                   value="{{ old('question') }}"
                   placeholder="Question liée au chapitre">
        </div>

        @if(!isset($affichePremier))
            <div>
                <label for="premier">Premier chapitre?</label>
                <input type="checkbox" name="premier" checked id="premier">
            </div>
        @endif
        <div>
            <button class="button-createChapitre" type="submit">Valider</button>
        </div>

    </form>

</section>
</div>