        
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

    <body style="background-color: #white;">

      <!--JavaScript at end of body for optimized loading-->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <style>
        .collapsible-body{
            padding-top: 0px !important;
        }
        
        .btn{
            
            background-color: #e8eef1 !important;
            color: #16556F !important;
            border: 1px solid #16556F;
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
    </style>
    <script type="text/javascript">

       $(document).ready(function(){
    $('select').formSelect();
  });
        
        
    </script>
        <div class="container" style="background-color: #fdfdfd">
            <div class="row">
                <div class="col s12 m6 card">
                    <div class="card-image">
                        <img src="winteler_logo.jpg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s12">
                                <select>
                                  <option value="" disabled selected>Tipo</option>
                                  <option value="1">Benzina</option>
                                  <option value="2">Pranzo</option>
                                  <option value="3">Altro</option>
                                </select>
                                <label>Materialize Select</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="last_name" type="number" class="validate">
                                <label for="last_name">Importo</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="textarea1" class="materialize-textarea"></textarea>
                                <label for="textarea1">Note</label>
                            </div>
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light" onclick="$('#login_form').submit()" type="button" name="action" style="width: 100%">Carica foto
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                            <div class="input-field col s12" >
                                <a style="width: 100%" class="waves-effect waves-light btn">Salva</a>
                            </div>
                            <div class="input-field col s12" >
                                <a href="winteler_menu.php" style="width: 100%" class="waves-effect waves-light btn">Menu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
  </html>