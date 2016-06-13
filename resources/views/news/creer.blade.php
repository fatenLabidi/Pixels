@extends('app')

@section('content')

<script>
    var CAT = {!! json_encode($categories) !!}
</script>
<div class="container">
    <div class="row">
        <div class="col-sm-5 form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>News</h3>
                    <p>Créer une nouvelle news en remplissant le formulaire ci-dessous</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-pencil"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form role="form" action="{{ url('creerNews')}}" method="post" class="registration-form">
                    <select id="categorieId" name="categorieId" class="form-categorie">
                        <option selected>choisir une categorie</option>
                        @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" >{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label class="sr-only" for="titre">Titre</label>
                        <input type="text" name="titre" placeholder="Titre..." class="form_Titre form-control" id="form_Titre" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="contenu" id="texte" required>Votre texte...</textarea>
                    </div>
                    <button type="submit" class="btn">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
