var View_New = Pclia.View.extend({
  model: ModelNew,

  'initialize': function(){
    this.listenTo(this.model, "change", this.render);
   this.render();
  },
  'render': function(){
    this.$el.html(Tmpl.Tmpl_New(this.model.attributes));
    return this.$el;
  },
});
