var Tmpl = {};
_.each(JST, function (template, name) {    
    Tmpl[name] = Handlebars.compile(template);
    Handlebars.registerPartial(name, Tmpl[name]);
})
Handlebars.registerHelper('convDate', function(timestamp) {
   var date = new Date(timestamp);
   return date.toLocaleDateString();
});