<!DOCTYPE html>
<html>
  <head>
    <script>
      function printDiv() {
        var divContents = document.getElementById("print-div").innerHTML;
        var a = window.open('', '', 'height=500, width=600');
        a.document.write('<html>');
        a.document.write('<body style="font-size:12px;text-align:center;">');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        setTimeout(function () {
          a.print();
        }, 500);
      } 
    </script>
  </head>
  <body style="font-size:12px;text-align:center;margin: 0px;margin-top: 5px;">
    <div id="print-div" style="padding: 10px;">
      <span style="text-align:center;margin-bottom:-10px;overflow:hidden;text-overflow:ellipsis;font-size: 9px;display:-webkit-box;-webkit-line-clamp: 2; 
      /* number of lines to show /-webkit-box-orient: vertical;/ display: block; */">{{$product->name}}</span>
      <br>
      <span style="text-align: left;">السعر {{$product->selling_price}} جنية</span>
      <br>
      <span style="text-align: left;">السعر {{$product->code}} جنية</span>
      <br>
     @php
 

     echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($product->code, 'C39E') . '" style="width:120px" height="38" width="190" alt="barcode"   />';


     @endphp
      <br>
     <span style="text-align: left;">الكود {{$product->code}} </span>
     
      <!-- <img id="barcode" src="./barcode.gif" style="width:120px"> -->
    </div>
    <input type="button" value="اطبع" onclick="printDiv()">
  </body>
</html>