var ACTUS = [
  {
    "titre": "deuxieme",
    "explication": "blabla",
    "id":1
  },
  {
    "titre": "dernier",
    "explication": "blabla",
    "id":2
  },
  {
    "titre": "arrive en premier",
    "explication": "blabla",
    "id":0
  }
];
$(function(){
  var news = new News(ACTUS);

  vn1 = new View_News({"collection": news});
  //var v_actualites = new View_News({"collection": ACTUS});
  var dom= vn1.render();
  $("#actualites").append(dom);
  //$("#acutalites").append(v_actualites.render());
});
