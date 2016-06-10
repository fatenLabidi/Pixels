@extends('app')

@section('content')
<div class="container-fluid">
    
    <form class="form-horizontal" role="form" method="POST" action="{{ url('creerQuestionQuiz') }}">    
        
        <input type="hidden" name="identifiantQuiz" value="{{ $identifiantQuiz }}">        

        <div class="form-group">
            <label class="col-md-4 control-label">Question</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="question">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Reponse 1 (doit être la bonne réponse)</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="reponse[]">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Reponse 2</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="reponse[]">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Créer question</button>
            </div>
        </div>
        
    </form>
                
</div>
@endsection
