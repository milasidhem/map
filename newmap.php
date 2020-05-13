<!DOCTYPE html>
<html>
<head>
    <title>Leaflet - Points</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
 integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
 crossorigin=""></script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        #mapid {
            width: 1200px;
            height: 800px;
        }
    </style>
</head>
<body>
<div id='mapid'></div>
<script src="points.js" type="text/javascript"></script>
<script>
    var mymap = L.map('mapid').setView([35.2157, -0.625634], 11);
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  subdomains: ['a','b','c']
}).addTo(mymap);

var gasgreen = L.icon({
    iconUrl: 'gasgreen.png'

});
var elecgreen = L.icon({
    iconUrl: 'elecgreen.png'

});
var watergreen = L.icon({
    iconUrl: 'watergreen.png'

});
var roadgreen = L.icon({
    iconUrl: 'roadgreen.png'

});
var waterorange = L.icon({
    iconUrl: 'waterorange.png'

});
var waterred = L.icon({
    iconUrl: 'waterred.png'

});
var roadred = L.icon({
    iconUrl: 'roadred.png'

});
var roadorange = L.icon({
    iconUrl: 'roadorange.png'

});
var elecorange = L.icon({
    iconUrl: 'elecorange.png'

});
var elecred = L.icon({
    iconUrl: 'elecred.png'

});

var gasred = L.icon({
    iconUrl: 'gasred.png'

});
var gasorange = L.icon({
    iconUrl: 'gasorange.png'

});

</script>
<?php
 $db_username = 'root';
 $db_password = '';
 $db_name     = 'base';
 $db_host     = 'localhost';
 $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
        or die('could not connect to database');
?>
<?php
$query = mysqli_query($db,"SELECT * FROM report")or die(mysql_error());
while($row = mysqli_fetch_array($query))
{
  $name = $row['title'];
  $lat = $row['locx'];
  $lon = $row['locy'];
  $desc = $row['description'];
  $type = $row['type'];
  $etat = $row['etat'];
  echo "<script type='text/javascript'> 
  if($type==1){  if($etat==1){
      var marker = L.marker([$lat, $lon],{icon: waterred}).addTo(mymap);}
    else if($etat==2){var marker = L.marker([$lat, $lon],{icon: waterorange}).addTo(mymap);}
    else if($etat==3){var marker = L.marker([$lat, $lon],{icon: watergreen}).addTo(mymap);}
    
    }
if($type==2){  if($etat==1){
        var marker = L.marker([$lat, $lon],{icon: roadred}).addTo(mymap);}
      else if($etat==2){var marker = L.marker([$lat, $lon],{icon: roadorange}).addTo(mymap);}
      else if($etat==3){var marker = L.marker([$lat, $lon],{icon: roadgreen}).addTo(mymap);}
      
      }
 if($type==3){  if($etat==1){
        var marker = L.marker([$lat, $lon],{icon: elecred}).addTo(mymap);}
      else if($etat==2){var marker = L.marker([$lat, $lon],{icon: elecorange}).addTo(mymap);}
      else if($etat==3){var marker = L.marker([$lat, $lon],{icon: elecgreen}).addTo(mymap);}
      
      }
 if($type==4){  if($etat==1){
        var marker = L.marker([$lat, $lon],{icon: gasred}).addTo(mymap);}
      else if($etat==2){var marker = L.marker([$lat, $lon],{icon: gasorange}).addTo(mymap);}
      else if($etat==3){var marker = L.marker([$lat, $lon],{icon: gasgreen}).addTo(mymap);}
      
      }
      
      
      
      

      
      
      
      </script>";
}
?>
</body>
</html>