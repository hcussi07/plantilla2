

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <head>
 <title>Hey, this is for you!</title>
 <style type="text/css">
   #box {
   background-color:black;
   color:white;
   padding:90px;
   position:absolute;
   display:block;
   font-family:verdana;
   font-size:20px;
   }
 </style>
 <script type="text/JavaScript">
  function moves(e){
   var cordx = 0;
   var cordy = 0;
   if (!e) {
    var e = window.event;
   }
   if (e.pageX || e.pageY){
    cordx = e.pageX;
    cordy = e.pageY;
   }
   else if (e.clientX || e.clientY){
    cordx = e.clientX;
    cordy = e.clientY;
   }
   document.getElementById('box').style.left = cordx;
   document.getElementById('box').style.top = cordy;
  }
 </script>
 </head>
 <body onClick="moves(event)">
 <div id="box">Hey! this is for you, enjoy :)</div>
 </body>
</html>