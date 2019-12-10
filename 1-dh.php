<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Win95.Tools</title>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0" />
    <meta property="og:image" content="assets/preview.png" />
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      
    <link rel="stylesheet" type="text/css" href="assets/win95.css">

      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/mark.js@8.11.1/dist/jquery.mark.min.js"></script>

      
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-95 ">
  <a class="navbar-brand" href="#">
      <img src="assets/icons/computer-3.png"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/tools/">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tools
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/tools/caesar">Caesar cipher</a>
          <a class="dropdown-item" href="/tools/lfsr">Linear feedback shift register</a>
          <a class="dropdown-item" href="/tools/mod2">XOR</a>
          <a class="dropdown-item" href="/tools/dh">Diffie–Hellman key exchange</a>
          <a class="dropdown-item" href="/tools/rsa">RSA</a>
          <a class="dropdown-item" href="/tools/dsrsa">RSA Digital signature</a>
        </div>
      </li>
    </ul>
  </div>
</nav>



<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Tools</h1>
  <p class="lead">cybersecurity tools.</p>
</div>

    
<div class="container">
<div class="card mb-4">
<div class="card-header">
        <h4 class="my-0 font-weight-normal">Diffie–Hellman key exchange</h4>
    </div>
<div class="card-body">
 <div>
    <label class="desc" for="a_unic">a = </label>
      <input id="a_unic" name="a_unic" type="text" class="field text fn" value="1" size="8"><button onclick="$('#a_unic').val(getRandomInt(10,100));get_Key();">random</button>
  </div><br>
 
  <div>
    <label class="desc" for="g">g = </label>
      <input id="g" name="g" type="text" class="field text fn" value="1" size="8"><button onclick="$('#g').val(getRandomInt(100,1000));get_Key();">random</button>
  </div>
    
  <div>
    <label class="desc" for="p">p = </label>
      <input id="p" name="p" type="text" class="field text fn" value="1" size="8"><button onclick="$('#p').val(getRandomInt(100,1000));get_Key();">random</button>
  </div>
    

    
  <div>
    <label class="desc" for="a">A = </label>
      <span id="A" class="field text fn"></span>
  </div>
    
  <div>
    <label class="desc" for="a">B = </label>
      <input id="B" name="B" type="text" class="field text fn" value="1" size="8">
  </div><br>

  <div>
    <label class="desc" for="a">Key = </label>
       <span id="key"></span>
  </div>  
  
  <div>
    <label class="desc" for="a">Bin Key = </label>
       <span id="bin_key"></span>
  </div>  

</div>
</div>
</div>   
<style type="text/css">

  </style>
  <script type="text/javascript">
  function powMod( base, exp, mod ){
    if (exp == 0) return 1;
    if (exp % 2 == 0){
      return Math.pow( powMod( base, (exp / 2), mod), 2) % mod;
    }
    else {
      return (base * powMod( base, (exp - 1), mod)) % mod;
    } 
  }
  function getRandomInt(min,max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }
  function get_Key(){
    var g = $("#g").val();
    var p = $("#p").val();
    var a = $("#a_unic").val();
    var B = $("#B").val();

    $("#A").text(powMod(g,a,p));
    var key = powMod(B, a, p);
    $("#key").text(key);
    $("#bin_key").text(key.toString(2));
  }
  $(document).ready(function() {get_Key();});
  $(".field").keyup(function(event) {get_Key();});
  function binary(str) {
return str.split(/\s/g).map((x) => x = String.fromCharCode(parseInt(x, 2))).join("");
}
function text2Binary(string) {
    return string.split('').map(function (char) {
        return char.charCodeAt(0).toString(2);
    }).join(' ');
}
function binarytoString(str) {
  return str.split(/\s/).map(function (val){
    return String.fromCharCode(parseInt(val, 2));
  }).join("");
}
  </script>
  <footer class="taskbar">
      <div class="row" style="margin-right: 0px;">
          <div class="col-8">
              <a href="https://myroslavtryhubets.com" class="btn start-button"><img src="assets/icons/users-1.png" class="icon-16">Author</a>
              <a href="https://github.com/myroslavtryhubets/fantastic-bassoon" class="btn start-button"><img src="assets/icons/directory_folder_options-5.png" class="icon-16"> GitHub</a>
          </div>
         
      </div>
    
  </footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>