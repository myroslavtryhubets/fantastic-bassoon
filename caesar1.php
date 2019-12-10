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
        <h4 class="my-0 font-weight-normal">Caesar cipher</h4>
    </div>
<div class="card-body">
    <p><textarea rows="4" cols="50" id='alphabet'>а,б,в,г,ґ,д,е,є,ж,з,и,і,ї,й,к,л,м,н,о,п,р,с,т,у,ф,х,ц,ч,ш,щ,ь,ю,я</textarea></p> 
    <p><input type="number" id='key' max='33' placeholder='Ключ 1-33'></p>
    <p>
        <textarea rows="4" cols="50"  id='decrypted' placeholder='Розшифрований текст'></textarea><br>
        <textarea rows="4" cols="50"  id='encrypted' placeholder='Зашифрований текст'></textarea>
    </p>
</div>
</div>
</div>   

<script type="text/javascript">
    window.alphabet = "";
    window.newAlphabet = "";
    window.key = 1;

    $( document ).ready(function() {
        alphabet = $("#alphabet").val().split(',').join('');
        newAlphabet = alphabet;
    });
    $("#alphabet").keyup(function(event) {alphabet = $("#alphabet").val().split(',').join('');});

    $("#key").keyup(function(event) {
        key = parseInt($(this).val());
        key = (key === undefined) ? (key = 1) : key;
        newAlphabet = '';  
        for (var i = 0; i < alphabet.length; i++) {
            currentLetter = (alphabet[i + key] === undefined) ? (alphabet[i + key - alphabet.length]) : (alphabet[i + key]);
            newAlphabet = newAlphabet.concat(currentLetter);
        }
    });

    $("#decrypted").keyup(function(event) {
        var message = $("#decrypted").val();var encryptedMessage = '';
        for (var i = 0; i < message.length; i++) {
            if(alphabet.indexOf(message[i].toLowerCase()) != -1){
                var indexOfLetter = alphabet.indexOf(message[i].toLowerCase());
                encryptedMessage = encryptedMessage.concat(newAlphabet[indexOfLetter]);
            }
            else{
                encryptedMessage = encryptedMessage.concat(message[i]);
            }
        }
        $("#encrypted").val(encryptedMessage.toLowerCase());
    });

    $("#encrypted").keyup(function(event) {
        var message = $("#encrypted").val();var encryptedMessage = '';
        for (var i = 0; i < message.length; i++) {
            if (message[i] == ' ') {encryptedMessage = encryptedMessage.concat(' ');continue};
            if(newAlphabet.indexOf(message[i].toLowerCase()) != -1){
                var indexOfLetter = newAlphabet.indexOf(message[i].toLowerCase());
                encryptedMessage = encryptedMessage.concat(alphabet[indexOfLetter]);
            }
            else{
                encryptedMessage = encryptedMessage.concat(message[i]);
            }        
        }
        $("#decrypted").val(encryptedMessage.toLowerCase());
    });

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