        
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body style="background-color: #white; ">

      <!--JavaScript at end of body for optimized loading-->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="<?=base_url("/assets/js/custom/winteler/quagga.js")?>"></script>
    <script src="<?=base_url("/assets/js/custom/winteler/file_input.js")?>"></script>
    <style>
        .collapsible-body{
            padding-top: 0px !important;
        }
        
        
        .input-field{
            background-color: white;
        }
        .btn{
            
            background-color: black !important;
            color: white !important;
            width: 100%;
        }
        
        .modal{
            max-height: none;
            width: 90%;
            height: 90%;
        }
        
        .card{
            padding: 10px !important;
            text-align: center;
        }
        
        input[type="file"] {
            display: none;
        }
        .custom-file-upload {
            height: 100%;
            width: 100%;
            display: inline-block;
            cursor: pointer;
            color: white !important;
        }
        
    </style>
    
        <div class="container" style="background-color: #fdfdfd">
            <div class="row" style="background: transparent">
                <div class="col s12 m6 offset-m3 card">
                    <div class="card-image">
                        <img src="<?=base_url("/assets/images/custom/Winteler/winteler_logo.png")?>">
                    </div>
                    <div class="card-content" style="font-size: 25px; ">
                            
                        Prova auto confermata
                        
                        
                    </div>
                    <div class="row" style="background: transparent;text-align: left">
                            <div class="col s6 m6 offset-m3">
                                <b>Modello:</b> <?=$modello?><br>
                                <b>Targa:</b> <?=$targa?><br>
                                <b>Cognome:</b> <?=$cognome?><br>
                                <b>Nome:</b> <?=$nome?><br/>
                            </div>

                        </div>
                    
                </div>
            </div>
            
        </div>
    </body>
  </html>