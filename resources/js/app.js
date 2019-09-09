/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


//AJAX Geolocalizzazione
$(document).ready(function(){

 $('.invio').click(function(){


   var dati = $("#form_geo").serializeArray(); //recupera tutti i valori del form automaticamente

   $.ajax({
      type: "GET",
      // specifico la URL della risorsa da contattare
      url: "https://api.tomtom.com/search/2/structuredGeocode.json",

      data: {
        "postalCode" : dati[7].value,
        "streetName" : dati[9].value,
        "streetNumber" : dati[10].value,
        "municipality" : dati[6].value,
        "countryCode" : 'IT',
        "key" : "G2OWs8LV0893ksnDEHmo7ZAWV7gddL4X"
     },

     dataType: "json",

     success: function(data){
      console.log(data);
      var lat = data.results[0].position.lat;
      var lon = data.results[0].position.lon;
      $('.lat_input').val(lat).text(lat);
      $('.lon_input').val(lon).text(lon);
     },

     error: function(){
       alert("Chiamata fallita!!!");
     }
   });
 });

  $('.modCoordinate').keydown(function(){
    $('.lat_input').val('').text('');
    $('.lon_input').val('').text('');
  });


// Ricerca appartamento
  $('.cerca').click(function(){


    var dati = $("#query_cerca").val(); //recupera tutti i valori del form automaticamente
    console.log(dati);
    $.ajax({
       type: "GET",
       // specifico la URL della risorsa da contattare
       url: "https://api.tomtom.com/search/2/structuredGeocode.json",

       data: {
         "postalCode" : '',
         "streetName" : '',
         "streetNumber" : '',
         "municipality" : dati,
         "countryCode" : 'IT',
         "key" : "G2OWs8LV0893ksnDEHmo7ZAWV7gddL4X"
      },

      dataType: "json",

      success: function(data){
       console.log(data);
       var lat = data.results[0].position.lat;
       var lon = data.results[0].position.lon;
       // $('.lat_input').val(lat).text(lat);
       // $('.lon_input').val(lon).text(lon);
      },

      error: function(){
        alert("Chiamata fallita!!!");
      }
    });
  });

});
