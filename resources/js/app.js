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

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//
// const app = new Vue({
//     el: '#app',
// });


//AJAX Geolocalizzazione
$(document).ready(function(){


 $('#calculate').change(function(){

   var dati = $("#form_geo").serializeArray(); //recupera tutti i valori del form automaticamente
   console.log(dati);
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

///////////////////////////////////////////////////////////////////////////////////////////////

// Ricerca appartamento
  $('#query_cerca').change(function(){
   var dati = $("#query_cerca").val(); //recupera la città inserita
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
      var lat = data.results[0].position.lat;
      var lon = data.results[0].position.lon;
      console.log(lat);
      console.log(lon);
      $('#lat_search').val(lat).text(lat);
      $('#lon_search').val(lon).text(lon);

     },
     error: function(){
       alert("Chiamata fallita!!!");
     }
   });
  });


 // Chiamata API filtri
   $('#km').keyup(function(){
     filtri();
   });

  $('#stanze').keyup(function(){
    filtri();
  });

  $('#letti').keyup(function(){
    filtri();
  });

  $('#wc').keyup(function(){
    filtri();
  });

  $('#mq').keyup(function(){
    filtri();
  });

  $('#wifi').change(function(){
    if ($("#wifi").prop("checked")) {
      $("#wifi").val(1);
    }else {
      $("#wifi").val(0);
    }
    filtri();
  });

  $('#parking').change(function(){
    if ($("#parking").prop("checked")) {
      $("#parking").val(1);
    }else {
      $("#parking").val(0);
    }
    filtri();
  });

  $('#pool').change(function(){
    if ($("#pool").prop("checked")) {
      $("#pool").val(1);
    }else {
      $("#pool").val(0);
    }
    filtri();
  });

  $('#reception').change(function(){
    if ($("#reception").prop("checked")) {
      $("#reception").val(1);
    }else {
      $("#reception").val(0);
    }
    filtri();
  });

  $('#spa').change(function(){
    if ($("#spa").prop("checked")) {
      $("#spa").val(1);
    }else {
      $("#spa").val(0);
    }
    filtri();
  });

  $('#sea_view').change(function(){
    if ($("#sea_view").prop("checked")) {
      $("#sea_view").val(1);
    }else {
      $("#sea_view").val(0);
    }
    filtri();
  });



});



// Funzione chiamata ajax per filtrare appartamenti
function filtri() {
  var km = $("#km").val();
  var stanze = $("#stanze").val();
  var letti = $("#letti").val();
  var wc = $("#wc").val();
  var mq = $("#mq").val();
  var wifi = $("#wifi").val();
  var parking = $("#parking").val();
  var pool = $("#pool").val();
  var reception = $("#reception").val();
  var spa = $("#spa").val();
  var sea_view = $("#sea_view").val();
  var latitudine = $("#latitudine").val();
  var longitudine = $("#longitudine").val();
  $.ajax({
     // specifico la URL della risorsa da contattare
     url: "http://localhost:8000/api/apartments",
     method: 'GET',
     data: {
       "km" : km,
       "rooms_number" : stanze,
       "host_number" : letti,
       "wc_number" : wc,
       "mq" : mq,
       "wifi" : wifi,
       "parking" : parking,
       "pool" : pool,
       "reception" : reception,
       "spa" : spa,
       "sea_view" : sea_view,
       "lat_search" : latitudine,
       "lon_search" : longitudine
     },

    dataType: "json",

    success: function(data){
     console.log(data);
     genera_card(data);

    },

    error: function(){
      alert("Chiamata fallita!!!");
    }
  });
}



// //////////////Handlebars Ricerca////////////////////////
// Genero il template
var card_appartamento = $("#card").html();
var template = Handlebars.compile(card_appartamento);
// Funzione che genera le cards e le inserisce nell'html
function genera_card(informazioni) {
  var j = 0;
  var distanza = 0;
  $(".container-handlebars").empty();
  console.log(informazioni.result.length);
  for (var i = 0; i < informazioni.result.length; i++) {
    if (informazioni.result[i].public) {
      j++;
      distanza = Math.round(informazioni.result[i].distance/1000);
      var context = {
        'address_id': informazioni.result[i].address_id,
        'img_url': informazioni.result[i].url_img,
        "titolo": informazioni.result[i].title,
        "via": informazioni.result[i].street,
        'cap': informazioni.result[i].cap,
        "citta": informazioni.result[i].city,
        "numero_civico": informazioni.result[i].civic_number,
        'provincia': informazioni.result[i].prov,
        "numero_stanze": informazioni.result[i].rooms_number,
        "numero_letti": informazioni.result[i].host_number,
        "numero_bagni": informazioni.result[i].wc_number,
        "metri_quadri": informazioni.result[i].mq,
        "wifi": informazioni.result[i].wifi,
        "parcheggio": informazioni.result[i].parking,
        "piscina": informazioni.result[i].pool,
        "portineria": informazioni.result[i].reception,
        "sauna": informazioni.result[i].spa,
        "vista_mare": informazioni.result[i].sea_view,
        "distanza": distanza
      }
      var html = template(context);
      $(".container-handlebars").append(html);
    }
  }
  if (j == 0) {
    $(".container-handlebars").html('<h2 style= "color: red">Nessun appartamento trovato!!</h2>');
  }
}
