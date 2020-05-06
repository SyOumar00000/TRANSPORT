$(document).ready( function () {
    // Paramétrage des marqueurs
    var pinColor = "29aec3";// couleur des épingles google MAP
    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
    var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
        new google.maps.Size(40, 37),
        new google.maps.Point(0, 0),
        new google.maps.Point(12, 35));
 
  function initialiser() {
    // Récupération de la latitude et longitude pour centrer notre carte
    var latlng = new google.maps.LatLng(43.295309,5.374457);

    //Objet contenant des les propriétés d'affichage de la carte Google MAP
    var options = {
          center    : latlng,
          zoom      : 14,
          mapTypeId : google.maps.MapTypeId.ROADMAP
                  };
  
    //Constructeur de la carte
    var carte = new google.maps.Map(document.getElementById("carte"), options);
  
    // Récupération en AJAX des données des lieux à épingler sur la carte Google map
    $.ajax({
       url   : 'index-map-ajax.php',
       error : function(request, error) { // Info Debuggage si erreur         
                 alert("Erreur sous genre - responseText: "+request.responseText);
                },                
    dataType : "json",  
    success  : function(data){
                  $("#carte").fadeIn('slow');
                  var infowindow = new google.maps.InfoWindow();    
                  var marker, i;   
                  // Parcours des données reçus depuis le fichier index-map-ajax.php
                  // Récupération de LatLng, Hint et Legende de chaque lieu et création d'un marqueur
                  $.each(data.items, function(i,item){
                     if (item) {
                        if (item.LatLng_lieu!=''){
                           // On sépare la latitude et la longitude
                           var strLatLng = item.LatLng_lieu.split(',');
                           marker = new google.maps.Marker({
                             position : new google.maps.LatLng(strLatLng[0], strLatLng[1]),
                             map      : carte,
                             icon     : pinImage,
                             shadow   : pinShadow,
                             title    : item.Titre_lieu
                            });          
                  google.maps.event.addListener(marker, 'click', (function(marker, i) {
                   return function() {
                   // Affichage de la légende de chaque lieu
                   infowindow.setContent('<a target="_blank" href="'+item.Url_lieu+'"><br/>'+item.Titre_lieu+' </a> ');
                   infowindow.open(carte, marker);
                  }
                })(marker, i));                              }         
                //alert('Vérification données reçues '+item.Titre_lieu+' -- '+item.Url_lieu+ ' -- '+item.LatLng_lieu);
              }
            });                        
          }
        }); 
      }initialiser();
  })