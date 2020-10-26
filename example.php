
<html>
  <head>
    <script>

class add{
       constructor(){
   
      //  document.getElementById('abc').innerHTML="addition\n";
       // Var s;
       l = document.getElementById("xyz").value ;
        document.getElementById("abc").value=l;


      }
    }
    
    function click1(){
      
      var s = document.getElementById("xyz").value;
      document.getElementById("data").innerHTML=s;

    
    
    a=new add();
    }
    </script>
  </head>
  <body>
    <input type=text id="xyz">Enter</input>

    <div id="data" name="display"></div>

    <input type=Button onclick=click1() id="abc" value="click"></input>

  </body>
</html>
