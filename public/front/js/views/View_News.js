var View_News = Pclia.ViewCollection.extend({
    'initialize': function(){
      this.listenTo(this.collection,' add', this.render);
      this.render();
    },
    'render': function(){
      var container = this.$el;
      container.html(Tmpl.Tmpl_News());

      _.each(this.collection.models, function(model){
        var view = new View_New({model: model});
        var dom = view.render();
        $(".news", container).append(dom);
      });
      return container;
    }
});
