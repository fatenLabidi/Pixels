@extends('app')

@section('content')

<script>
    var CAT = {!! json_encode($categories) !!}
</script>
<div class="container-fluid">

    <form class="form-horizontal" role="form" method="POST" action="{{ url('creerFiche') }}">           

        <div class="form-group">
            <select id="nomCategorie" name="nomCategorie">
                <option selected>choisir une categorie</option>
                @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}" >{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Thème de la fiche</label>
            <div class="col-md-6">
                <input type="number" class="form-control" name="themeId">
            </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Titre</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="titre">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Contenu</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="contenu">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Créer la fiche</button>
                    </div>
                </div>

                </form>

            </div>
            @endsection
