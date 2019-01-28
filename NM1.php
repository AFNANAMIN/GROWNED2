<!DOCTYPE html>
<html>
<?php 

//session_start();
require_once('db-config.php');
include('functions.php');
$us_id=$_SESSION['us_id'];
   $qry="SELECT * FROM `tree` where `id`= ". $us_id;
   $result=mysqli_query($db,$qry);
   $lng_arr=array();
   $lat_arr = array();
   $type_arr = array();
   $i=0;

if($result) { 
      while($row = mysqli_fetch_assoc($result)) {
         $lng_arr[$i] = $row["tree_lng"];
         $lat_arr[$i] =  $row["tree_lat"];
         $type_arr[$i]= $row["type"];

         $i++;

      }
   }

?>
<head>
    <meta charset='utf-8' />
    <title>Create a draggable Marker</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.js"></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.css' rel='stylesheet' />
    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:80%; }
    </style>
</head>
<body>





</style>

<style type='text/css'>
    #info {
        display: block;
        position: relative;
        margin: 0px auto;
        width: 50%;
        padding: 10px;
        border: none;
        border-radius: 3px;
        font-size: 12px;
        text-align: center;
        color: #222;
        background: #fff;
    }
</style>

<style>
.coordinates {
    background: rgba(0,0,0,0.5);
    color: #fff;
    position: absolute;
    bottom: 10px;
    left: 10px;
    padding:5px 10px;
    margin: 0;
    font-size: 11px;
    line-height: 18px;
    border-radius: 3px;
    display: none;
}

</style>

<div id='map'></div>
<pre id='coordinates' class='coordinates'></pre>

<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiYnVzaHJhbmFqYW0iLCJhIjoiY2pvMWtqb2VwMGJtaTNrcGFmOHFucjlkOCJ9.mmt1DEL1M2LlEULERg4T_A';
//var bounds = [ [67.109963,24.934481], // Southwest coordinates[67.109533,24.933992]  // Northeast coordinates];
var coordinates = document.getElementById('coordinates');
var bounds = [
    [67.10467741712804,24.929040045943793], // Southwest coordinates
    [67.12555841455622,24.938476093497187]  // Northeast coordinates
];
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/bushranajam/cjor8ubav6vr32rqsi9decxcb',
    //maxBounds: bounds ,// Sets bounds as max
    center: [67.109963,24.93448],
    zoom: 15.8,
    maxBounds: bounds 
});

map.addControl(new mapboxgl.NavigationControl());
map.addControl(new mapboxgl.FullscreenControl());
var popup5 = new mapboxgl.Popup();

map.on('mousemove', function(e) {
        var features = map.queryRenderedFeatures(e.point, { layers: ['sfc'] });
        
        // popup.remove();// Change the cursor style as a UI indicator.
        map.getCanvas().style.cursor = (features.length) ? 'not-allowed' : '';

        if (!features.length) {
          
            return;
        }

        var feature = features[0];
  
        popup5.setLngLat(e.lngLat)
            .setText("restricted areas")
            .addTo(map);
    });

map.on('click', function(e) {
        var features = map.queryRenderedFeatures(e.point, { layers: ['sfc'] });
        
        // Change the cursor style as a UI indicator.
        map.getCanvas().style.cursor = (features.length) ? 'not-allowed' : '';

        if (!features.length) {
            fts=features.length;
            return;
        }

        var feature = features[0];
        fts=features.length;
        popup5.setLngLat(e.lngLat)
            .setText("restricted areas")
            .addTo(map);
    });



var js_lng =<?php echo json_encode($lng_arr );?>;
var js_lat =<?php echo json_encode($lat_arr );?>;
var js_typ =<?php echo json_encode($type_arr );?>;
var lat1;
var lng1;
map.on('load',function(){load();
});

function load(){
  
   var stored_markers;
   for (var i = 0; i < js_lat.length; i++) {


if(js_typ[i]=="1")
{var img = new Image(45,45); // Image constructor
img.src = 't.png';


}

  else if(js_typ[i]=="2")
  {var img = new Image(45,45); // Image constructor
   img.src ='t1.png';}

else if(js_typ[i]=="3")
{var img = new Image(45,45); // Image constructor
img.src = 't2.png';}

     lng1=Number(js_lng[i]);
   lat1 =Number(js_lat[i]);
   var stored_markers= new mapboxgl.LngLat(lng1,lat1);
   var pop=new mapboxgl.Popup()
   .setText('tree type'+js_typ[i])
   .addTo(map)
   var marker = new mapboxgl.Marker({element:img})
    .setLngLat(stored_markers)
    .setPopup(pop) 
    .addTo(map);
     
}
}


var img1 = new Image(45,45); // Image constructor
img1.src = 'tree/2.jpg';


 var fts;
     var mlnglat=new mapboxgl.LngLat(67.1194048317503,24.936502742350484);
     var popup = new mapboxgl.Popup({closeButton:false})

map.on('click', function (e) {

 mlnglat=e.lngLat;
coordinates.style.display = 'block';
    coordinates.innerHTML = 'Longitude:' + mlnglat.lng + '<br/>Latitude: ' + mlnglat.lat;

    for(j=0;j<i;j++)
{
  if(mlnglat.lng==lg_arr[j] && mlnglat.lat==lt_arr[j])
    {alert("tree has already placed");}
 
}
  var features = map.queryRenderedFeatures(e.point, { layers: ['sfc'] });
   if (features.length) {
            fts=features.length;
            return;
        }
fts=features.length;
popup.setLngLat(mlnglat)
  popup.setText("select type")
  popup.addTo(map);

});

    
var i=0;   
var lg_arr = new Array(20);
var lt_arr = new Array(20);
var type_arr= new Array(20);
var img_id=1;

function countTree(ltlng,id)
{

lg_arr[i]=ltlng.lng;
lt_arr[i]=ltlng.lat;
type_arr[i]=id;
i++;



}

function identifyTree(ltlng)
{
for (var j = 0; j <= lg_arr.length ; j++) {
  if (lg_arr[j]==ltlng.lng && lt_arr[j]==ltlng.lat) 
      {removeTree(j);}
  }
}


function removeTree(ind)
{
  for (var j = ind ; j<=(lg_arr.length-1) ; j++) 
  {
    lg_arr[j]=lg_arr[j+1];
        lt_arr[j]=lt_arr[j+1]
        type_arr[j]=type_arr[j+1]
      }
  i--

}





function addTree(id)
{

//document.write(fts);
if(fts){return;}

 
popup.remove();
 var ll=mlnglat; 

for(j=0;j<i;j++)
{

  if(ll.lng==lg_arr[j] && ll.lat==lt_arr[j])
    {alert("tree has already placed");return;}
}



if(id==1)
{
var img2 = new Image(45,45);
img2.id=img_id;

img2.src = 'tree/2.jpg';

var marker1 = new mapboxgl.Marker({element: img2})
  

  img2.addEventListener('click',
    function(){
    var c=confirm("do you want to delete tree?");
  if(c)
    {var ltlng=marker1.getLngLat();
    identifyTree(ltlng);
      marker1.remove();}
});
  img2.addEventListener('mouseover',function(){
    var popup1 = new mapboxgl.Popup()
 .setText(" tree type 1")
 .setLngLat(ll)
 .addTo(map)
  
  });



}
else if(id==2)
{
var img3 = new Image(45,45); // Image constructor
img3.src = 'tree/2.jpg';
img3.id=img_id;
  var marker1 = new mapboxgl.Marker({element: img3})
  

img3.addEventListener('click',function(){
    var c=confirm("do you want to delete tree?");
  if(c)
    {var ltlng=marker1.getLngLat();
     identifyTree(ltlng);
      marker1.remove();}
});

  img3.addEventListener('mouseover',function(){
    var popup2 = new mapboxgl.Popup()
 .setText(" tree type 2")
 .setLngLat(ll)
 .addTo(map)
  
  });

  

}


else if(id==3)
{
var img4 = new Image(45,45); // Image constructor
img4.src = 'tree/t.jpg';
img4.id=img_id;
  var marker1 = new mapboxgl.Marker({element: img4})
  

img4.addEventListener('click',function(){
    var c=confirm("do you want to delete tree?");
  if(c)
    {var ltlng=marker1.getLngLat();
     identifyTree(ltlng);
     marker1.remove();}
  
  });

img4.addEventListener('mouseover',function(){
    var popup3 = new mapboxgl.Popup()
 .setText(" tree type 1")
 .setLngLat(ll)
 .addTo(map)
  
  
  });



}
  
marker1.setLngLat(ll);
marker1.addTo(map);
countTree(ll,id);

 }



function send_data()
 {



document.getElementById('i').value= i;

// for (var j = 0; j <i ; j++) {
   
  document.getElementById('lg_arr[]').value = lg_arr;

   document.getElementById('lt_arr[]').value = lt_arr;
    
  document.getElementById('type_arr[]').value = type_arr;

    
// }

}



</script>


  <form align="right"  method="POST" action="page.php" onsubmit="send_data()" >
  <div id="mapCanvas"></div> 
  <div id="infoPanel"></div>
    <div id="address"></div>
<input type="hidden" name="lg_arr[]" id="lg_arr[]" value="" >
  <input type="hidden" name="lt_arr[]" id="lt_arr[]" value="">
  <input type="hidden" name="type_arr[]" id="type_arr[]" value="">
  <input type="hidden" name="i" id="i" value="">
   <button id="1" name="addT1" type="button"   onclick= "addTree(this.id)"  >add type1</button>
   <img src="tree/2.jpg" height="45px" width="45px"><br>
    <button  id="2" name="addT2" type="button"   onclick= "addTree(this.id)"  >add type2</button>
    <img src="tree/t.jpg" height="45px" width="45px"><br>
     <button id="3" name="addT3" type="button" onclick= "addTree(this.id)"  >add type3</button>
     <img src="tree/t.jpg" height="45px" width="45px"><br><br>
     <input type="submit" id="submit" value="Add Tree"><br>

   </form>
   <br>


</body>
</html>
