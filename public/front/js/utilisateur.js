var now = new Date();
var annee = now.getFullYear();

$(function() {        
    var modelUtilisateur = new ModelUtilisateur( {
        pseudo: "Youyou",
        motDePass: "JeSuisMotDePass",
        motDePassConfirmation: "JeSuisMotDePass",
        sexe: "homme",
        anneeNaissance: 1991
    });
      
    if (!modelUtilisateur.isValid()) {
        alert(modelUtilisateur.validationError);
    }    
    
    var view_utilisateur = new ViewUtilisateur ( {
       model: modelUtilisateur
    });
    
    var dom = view_utilisateur.render();
    $('#compteUtilisateur').append(dom);
          

//    $(window).on("popstate", function(e) {
//        $("div").hide();
//        var div = location.hash;
//        if ($(div).length == 0) {
//            div = ".informationsPersonnelles";
//        }
//        $(div).show();
//    });
//    
//    $(window).trigger("popstate");
//
//    function switchDiv(div) {
//        history.pushState(null, null, div);
//        $(window).trigger("popstate");
//    }
    
    

});
