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
        <h4 class="my-0 font-weight-normal">Linear feedback shift register</h4>
    </div>
<div class="card-body">
<p>
  <div style="display: inline-block;">Key = <span id="key-info"></span> <br><textarea rows="4" cols="50" class="input" id='key' placeholder='Key'>10110</textarea></div>
  <div style="display: inline-block;">Primitive polynomial = <span id="primitive_polynomial-info"></span> <br><textarea rows="4" cols="50" class="input" id='primitive_polynomial' placeholder='Primitive polynomial'>101001</textarea></div>
</p>

<div style="display: none;"> id="result-str"></div>
output <div id="result-strX2"></div>
repetition <div id="result-repetition"></div><br>
<div id="result"></div>
</div>
</div>
</div>   

<script type="text/javascript">
  function lfsr(){
    var list_key = $('#key').val().split('').map(Number);
    var list_pp = $('#primitive_polynomial').val().split('').map(Number);list_pp.shift();
    if(list_key.length <= 2 || list_pp.length <= 2){
      return 0;
    }

    $("#key-info").html(list_key.join(', '));
    $("#primitive_polynomial-info").html(list_pp.join(', '));
    out = [];outX2 = [];var steps = [];
    for(var i=0; i<Math.pow(2, list_key.length)-1; i++){
        temp = [];
        steps += (i+1)+" - ";
        for(var j=0; j<list_key.length; j++){
           if (list_pp[j] == 1){
             temp.unshift(list_key[j]);
             steps += " <b style='color:red;'>"+list_key[j]+"</b> ";
           }
           else{
          steps += " "+list_key[j]+" ";
           }
      }
        out.push(list_key.pop());
        list_key.unshift(eval(temp.join('+'))%2);
        steps += "<br>";
    }

    for(var i=Math.pow(2, list_key.length)-1; i<(Math.pow(2, list_key.length)-1)*2; i++){
        temp = [];
        for(var j=0; j<list_key.length; j++){
           if (list_pp[j] == 1){temp.unshift(list_key[j]);}
      }
        outX2.push(list_key.pop());
        list_key.unshift(eval(temp.join('+'))%2);
    }
    $("#result").html(steps);
    $("#result-str").html("<b>"+out.join('')+"</b>");
    var main = out.join('')+outX2.join('');
    $("#result-strX2").html(main);
    var out_length = out.length;
    var temp_out = out.join('');

    for(var j=0; j<out.length; j++){
       if(main.indexOf(temp_out,5) === -1){
        temp_out.pop();
        temp_out = temp_out.join('');
       }
       else{
        var sum = main.substr(0, main.indexOf(temp_out,5));
        main = main.substr(0, main.indexOf(temp_out,5))+"<b style='color:red;'>"+main[main.indexOf(temp_out,5)]+"</b>"+main.substr(main.indexOf(temp_out,5)+1,main.length);

        $("#result-strX2").html(main);
        
        break;
       } 
       //
       
    }
    $("#result-repetition").html(sum.length+1);
    
    //$("#result-strX2").mark($("#result-str b").text().substr(0, Math.pow(2, $('#key').val().split('').map( Number ).length)-1));
  }
  $(document).ready(function() {lfsr();});
  $(".input").keyup(function(event) {lfsr();});
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