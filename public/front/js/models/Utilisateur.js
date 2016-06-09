var ModelUtilisateur = Pclia.Model.extend({

    validate: function(attrs, options) {    
        
        // Mot de passe validation
        if (!_.isEmpty(attrs.motDePasse)) {
            if ((attrs.motDePasse).length < 6) {
                return {
                    field: "motDePasse",
                    msg: "Le mot de passe doit contenir au minimum 6 caractères"
                };    
            }
        }      
        
        // Mot de passe confirmation validation
        if (!_.isEqual(attrs.motDePasseConfirmation, attrs.motDePasse)) {
            return {
                    field: "motDePasseConfirmation",
                    msg: "Le mot de passe de confirmation doit être identique au mot de passe"
                }; 
        }
        
        // Année de naissance validation
        if (!_.isEmpty(attrs.anneeNaissance)) {
            if (attrs.anneeNaissance > annee-11) {
                return {
                    field: "anneeNaissance",
                    msg: "Les utilisateurs qui sont agés de moins de 11 ans ne peuvent s'inscrire"
                };
            }
        }
        
        // Sexe validation
        if (!_.isEmpty(attrs.sexe)) {
            if (attrs.sexe != "homme" && attrs.sexe != "femme") {
                return "Le sexe doit être égal à homme, à femme";
            }
        }
        // Email validation
//        if (!_.isEmpty(attrs.email)) {
//            if (!_.pattern(attrs.email)) {
//               return {
//                    field: "email",
//                    msg: "Le format de l'email n'est pas correct"
//                };
//            }
//        }
    }

});
