@extends('app')

@section('content')

<script>
    var ACTUS = {!! json_encode($superdonnees) !!}
</script>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>

                <div class="panel-body">                    
                    
                    <div id="actualites">
                    </div>

                    <br/> Affichage des catégories quelque part par là ...
                </div>
            </div>
        </div>
    </div>
</div>
@endsection