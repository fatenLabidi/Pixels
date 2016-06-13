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
                    <h3>Fiches Techniques</h3>
                    <p>Créer une nouvelle fiche en remplissant le formulaire ci-dessous</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-pencil"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form role="form"  method="post" class="registration-form" id="categorieId" 
                      name="categorieId" action="{{ url('creerFiche')}}">
                    <select id="categorieId" name="categorieId">
                        <option selected>choisir une categorie</option>
                        @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" >{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                    <select class="form-categorie" name="themeId" required>
                        <option>Theme</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
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
<!--<div class="container-fluid">

    <form class="form-horizontal" role="form" method="POST" action="{{ url('creerFiche') }}">           

        <div class="form-group">
            <select id="categorieId" name="categorieId">
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

            </div>-->
@endsection
