

        
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

         <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body style="background-color: #white; ">

      <!--JavaScript at end of body for optimized loading-->
      
    <style>
        .collapsible-body{
            padding-top: 0px !important;
        }
        
        
        .input-field{
            background-color: white;
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
        
        /*Correzione materializecss per bug select su iPhone-->*/
        .select-wrapper * { transition: none !important; transform: none !important; }
        
    </style>
    <script type="text/javascript">
        function taleda_salva_scan(el)
        {
            var fd = new FormData();
            var files = $('#oggetto-upload')[0].files;
            $.each(files, function(i, file) {
                fd.append('file_oggetto[]', file);
            });
            var files = $('#documento-upload')[0].files;
            $.each(files, function(i, file) {
                fd.append('file_documento[]', file);
            });
            
            
            fd.append('riferimento',$('#riferimento').val());
            $.ajax({
                url: '<?= controller_url()."taleda_salva_scan" ?>',
                method: 'POST',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response){
                    alert('PDF generato');
                },
                error:function(){
                    alert('errore');
                }
            });
        }
        
    </script>
        <div class="container" style="background-color: #fdfdfd">
            <div class="row" style="background: transparent">
                <div class="col s12 m6 offset-m3 card">
                    <div class="card-image">
                        <img style="height: auto;width: auto;margin: auto;" src="<?=base_url("/assets/logo-taleda.png")?>">
                    </div>
                    <div class="card-content" >
                            
                        <div class="input-field col s12">
                            <div class="row">
                                <div class="btn col s5">
                                    <label for="documento-upload" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Documento
                                    </label>
                                    <input id="documento-upload" type="file" accept="image/*" capture />
                                    <div id="statodocumento"></div>
                                </div>
                                <div class="col s2">
                                </div>
                                <div class="btn col s5">
                                    <label for="oggetto-upload" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Oggetto
                                    </label>
                                    <input id="oggetto-upload" type="file" accept="image/*" capture />
                                    <div id="statooggetto"></div>
                                </div>
                            </div>
                            <div class="row">
                                
                            </div>
                            <div class="row">
                                
                            </div>
                            <div class="row">
                                
                            </div>
                            <div class="row">
                                
                            </div>
                            <div class="row">
                                <a class="waves-effect waves-light btn" onclick="taleda_salva_scan()">Salva</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
  </html>