var News = Pclia.Collection.extend({
  model: ModelNew,
  comparator: function(news1, news2){
    if(news1.get("id") > news2.get("id")){
      return 1;
    }
  }
});
