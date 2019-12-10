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
        <h4 class="my-0 font-weight-normal">RSA</h4>
    </div>
<div class="card-body">
<table border="0" width="100%">
  <tr>
    <td width="33%" height="50"><b>Alice</b></td>
    <td width="33%" height="50"></td>
    <td width="33%" height="50"><b>Bob</b></td>
  </tr>
  <tr>
    <td width="33%" height="50">
      p = <input id="p" name="p" type="text" class="field text fn get_e" value="1" size="8"><button onclick="$('#p').val(getRandomInt());get_e();">random</button>
      <br>
      q = <input id="q" name="q" type="text" class="field text fn get_e" value="1" size="8"><button onclick="$('#q').val(getRandomInt());get_e();">random</button>
      <br>
      e = <span id="e">1</span> 
      <br>
      n = <span id="n">1</span> 
      <br><br>
      Закритий ключ<br>
    (<span id="d_pkey">1</span>, <span id="n_pkey">1</span>)
    <br><br>
    M = <span id="m_p">1</span>
  </td>
    <td width="33%" height="50">
      <center>
        Відкритий ключ<br>
        (<span id="e_key">1</span>, <span id="n_key">1</span>)
        <br><br>
        Криптограма<br>
        (<span id="c_k">1</span>)
        <br><br>
      </center>
    </td>
    <td width="33%" height="50">
      M = <input id="m" name="m" type="text" class="field text fn get_e" value="1" size="8" onkeyup="get_e();"> 
      <br><br>
      c = <span id="c">1</span>
    </td>
  </tr>
</table>  
</div>
</div>
</div>   
<script type="text/javascript">
function gcd (a, b){
   var r;
   while (b>0)
   {
      r=a%b;
      a=b;
      b=r;
   }
   return a;
}

function rel_prime(phi){
   var rel=5;
   
   while (gcd(phi,rel)!=1)
      rel++;
   return rel;
}

function power(a, b){
   var temp=1, i;
   for(i=1;i<=b;i++)
      temp*=a;
    return temp;
}

function encrypt(N, e, M){
   var r,i=0,prod=1,rem_mod=0;
   while (e>0){
      r=e % 2;
      if (i++==0)
         rem_mod=M % N;
      else
         rem_mod=power(rem_mod,2) % N;
      if (r==1)
      {
         prod*=rem_mod;
         prod=prod % N;
      }
      e=parseInt(e/2);
   }
   return prod;
}
function calculate_d(phi,e){
   var x,y,x1,x2,y1,y2,temp,r,orig_phi;
   orig_phi=phi;
   x2=1;x1=0;y2=0;y1=1;
   while (e>0)
   {
      temp=parseInt(phi/e);
      r=phi-temp*e;
      x=x2-temp*x1;
      y=y2-temp*y1;
      phi=e;e=r;
      x2=x1;x1=x;
      y2=y1;y1=y;
      if (phi==1)
      {
         y2+=orig_phi;
         break;
      }
   }
   return y2;
}
function getPrimes(max) {
    var sieve = [], i, j, primes = [];
    for (i = 2; i <= max; ++i) {
        if (!sieve[i]) {
            primes.push(i);
            for (j = i << 1; j <= max; j += i) {
                sieve[j] = true;
            }
        }
    }
    return primes;
}

function getRandomInt() {
  var primes = getPrimes(1000);
  return primes[Math.floor(Math.random()*primes.length)];
}
function decrypt(c, d, N){
   var r,i=0,prod=1,rem_mod=0;
   while (d>0)
   {
      r=d % 2;
      if (i++==0)
         rem_mod=c % N;
      else
         rem_mod=power(rem_mod,2) % N;
      if (r==1)
      {
         prod*=rem_mod;
         prod=prod % N;
      }
      d=parseInt(d/2);
   }
   return prod;
}


function get_e(){
  var p = $("#p").val();
  var q = $("#q").val();
  if(p != "1" && q != "1"){
    var phi = (p-1)*(q-1);
    var e = rel_prime(phi);
    $("#e").text(e);
    var n = parseInt(p)*parseInt(q);
    $("#n").text(n);
    $("#e_key").text(e);
    $("#n_key").text(n);
    var m = $("#m").val();
    var c = encrypt(n,e,m)
    $("#c").text(c);
    $("#c_k").text(c);
    var d=calculate_d(phi,e);
    $("#d_pkey").text(d);
    $("#n_pkey").text(n);
    $("#m_p").text(decrypt(c,d,n));
  }
} 
  $(document).ready(function() {get_e();});
  $(".field").keyup(function(event) {get_e();});
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