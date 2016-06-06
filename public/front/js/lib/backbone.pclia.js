var Pclia = {};
Pclia.Model = Backbone.Model.extend({    
    constructor: function() {
        this.on("my:log", this.log);
        //this.on("change", this.log);
        Backbone.Model.apply(this, arguments);
    },    
    log: function () {
        console.log("----------------");
        console.log(this.toJSON());        
    }
});
Pclia.View = Backbone.View.extend({  
    
});
Pclia.ViewCollection = Backbone.View.extend({  

});
Pclia.Collection = Backbone.Collection.extend({
    constructor: function() {        
        //this.on("add remove change", this.log);         
        Backbone.Collection.apply(this, arguments);
    },
    log: function () {
        console.log("----------------");
        console.log(this.toJSON());        
    },
    removeAt: function (indice) {
        var model = this.at(indice);        
        this.remove(model);
    }
});