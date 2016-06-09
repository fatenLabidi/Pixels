var ViewUtilisateur = Pclia.View.extend( {
    events: {
        "click .showProfil": "showProfil",
        "click .showQuizResultat": "showQuizResultat",       
        "click .showMotDePasse": "showMotDePasse",
        "click .showCategorieCreer": "showCategorieCreer",
        "click .showFicheCreer": "showFicheCreer",        
        "click .showThemeCreer": "showThemeCreer",
        "click .showQuizCreer": "showQuizCreer",
        "click .showModification": "presentationModification",
        "click .validerModification": "validerModification",        
        "click .annuler": "annuler"
    },
    render: function () {
       this.$el.html(Tmpl.Tmpl_Utilisateur(this.model.attributes));
       $("div", this.$el).hide();
       $(".tableauDeBord", this.$el).show();
       return this.$el;
    },
    showProfil: function () {
        $("div", this.$el).hide();
        $(".informationsPersonnelles", this.$el).show();
        $(".error", this.$el).hide();
    },
    showQuizResultat: function () {
        $("div", this.$el).hide();
        $(".quizResultat", this.$el).show();
    },
    showCategorieCreer: function () {
        $("div", this.$el).hide();
        $(".showCategorieCreer", this.$el).show();
    },
    showThemeCreer: function () {
        $("div", this.$el).hide();
        $(".showThemeCreer", this.$el).show();
    },
    showFicheCreer: function () {
        $("div", this.$el).hide();
        $(".showFicheCreer", this.$el).show();
    },
    showQuizCreer: function () {
        $("div", this.$el).hide();
        $(".showQuizCreer", this.$el).show();
    },
    annuler: function () {
        void window.location.reload()
    },
    validerModification: function() {
        $(error, this.$el).hide();
        var pseudo = $(".mod_pseudo", this.$el).val();
        var anneeNaissance = $(".mod_anneeNaissance", this.$el).val();
        var email = $(".mod_email", this.$el).val();
        var sexe = $(".mod_sexe", this.$el).val();
        this.model.set({
           pseudo: pseudo,
           anneeNaissance: anneeNaissance,
           email: email,
           sexe: sexe
        });
        
        if (!this.model.isValid()) {
            var field = ".mod_" + this.model.validationError.field;
            var error = ".error_" + this.model.validationError.field;
            $(field).addClass("fieldError");       
            $(error, this.$el).show();
            $(error).text(this.model.validationError.msg);
        } else { 
            this.model.save();
            $(error, this.$el).hide();
            $(field).removeClass("fieldError");       
        }
    },
    
    showMotDePasse: function () {       
        if ($(".mod_motDePasse").attr('type') == "password") {
            $(".mod_motDePasse").attr('type', "text");
            $(".showMotDePasse").text("Masquer le mot de passe");
        } else {
            $(".mod_motDePasse").attr('type', "password");
            $(".showMotDePasse").text("Affiche le mot de pase");
        }
        
        if ($(".mod_motDePasseConfirmation").attr('type') == "password") {
            $(".mod_motDePasseConfirmation").attr('type', "text");
        } else
            $(".mod_motDePasseConfirmation").attr('type', "password");

    }
    
});