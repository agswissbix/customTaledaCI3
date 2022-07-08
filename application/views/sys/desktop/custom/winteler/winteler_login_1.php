        
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

    
       function winteler_login()
       {


                    var fd = new FormData();
                    fd.append('utente',$('#utente').val());
                    fd.append('password',$('#password').val());
                    
                    $.ajax({
                        url: '<?= controller_url()."winteler_login" ?>',
                        method: 'POST',
                        data: fd,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(response){
                          
                          $('html').html(response);
                        },
                        error:function(){
                            alert('errore');
                        }
                    });

       }
       
       //your script here.
       
        
        
    </script>
        <div class="container" style="background-color: #fdfdfd">
            <div class="row">
                <div class="col s12 m6 card">
                    <div class="card-image">
                        <img src="<?=base_url("/assets/images/custom/Winteler/winteler_logo.jpg")?>">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                      <div class="row">
                      <div class="input-field col s12">
                          <input placeholder="Utente" id="utente" type="text" class="validate">
                          <label for="utente">Utente</label>
                      </div>
                      </div>
                      <div class="row">
                          <div class="input-field col s12">
                              <input placeholder="Password" id="password" type="text" class="validate">
                              <label for="password">Password</label>
                          </div>
                      </div>
                      </div>
                    
                    
                    <a class="waves-effect waves-light btn" onclick="winteler_login()">Login</a>
                </div>
            </div>
        </div>
    </body>
  </html>