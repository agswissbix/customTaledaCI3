        
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
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
        
        /*Correzione materializecss per bug select su iPhone-->*/
        .select-wrapper * { transition: none !important; transform: none !important; }
        
    </style>
    <script type="text/javascript">

       function winteler_load_menu(el)
       {
            $.ajax({
                url: '<?= controller_url()."winteler_load_menu" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
       }
       
       function winteler_load_conferma_salvataggio(el)
       {
            $.ajax({
                url: '<?= controller_url()."winteler_load_conferma_salvataggio" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
       }
       
       function winteler_load_notespese(el)
    {
        $.ajax({
                url: '<?= controller_url()."winteler_load_notespese" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
    }
    function winteler_load_barcode(el)
    {
        $.ajax({
                url: '<?= controller_url()."winteler_load_barcode" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
    }
    function winteler_load_proveauto(el)
    {
        $.ajax({
                url: '<?= controller_url()."winteler_load_proveauto" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
    }
    
    function winteler_load_provaauto(el,statoprocesso,fidd)
    {
        var url='<?= controller_url()?>/winteler_load_provaauto/'+statoprocesso+'/'+fidd;
         $.ajax({
             url: url,
             method: 'url',
             success:function(response){
               $('.card-content').html(response);
             },
             error:function(){
                 alert('errore');
             }
         });
    }
    
    function winteler_logout(el)
    {
        $.ajax({
                url: '<?= controller_url()."winteler_logout" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
    }
        
    function winteler_load_proveauto_nuova(el)
    {
         $.ajax({
             url: '<?= controller_url()."winteler_load_proveauto_nuova" ?>',
             method: 'url',
             success:function(response){
               $('.card-content').html(response);
             },
             error:function(){
                 alert('errore');
             }
         });
    }
    
    function winteler_load_proveauto_aggiorna_precompilata(el,fidd)
    {
         $.ajax({
             url: '<?= controller_url()."winteler_load_proveauto_aggiorna_precompilata" ?>/'+fidd,
             method: 'url',
             success:function(response){
               $('.card-content').html(response);
             },
             error:function(){
                 alert('errore');
             }
         });
    }
    
    function winteler_load_proveauto_aggiorna_incorso(el,fidd)
    {
         $.ajax({
             url: '<?= controller_url()."winteler_load_proveauto_aggiorna_incorso" ?>/'+fidd,
             method: 'url',
             success:function(response){
               $('.card-content').html(response);
             },
             error:function(){
                 alert('errore');
             }
         });
    }
    
    function winteler_load_proveauto_precompilate(el,mostratutti)
    {
         $.ajax({
             url: '<?= controller_url()."winteler_load_proveauto_precompilate" ?>'+'/'+mostratutti,
             method: 'url',
             success:function(response){
               $('.card-content').html(response);
             },
             error:function(){
                 alert('errore');
             }
         });
    }
    
    function winteler_load_proveauto_incorso(el,mostratutti)
    {
         $.ajax({
             url: '<?= controller_url()."winteler_load_proveauto_incorso" ?>'+'/'+mostratutti,
             method: 'url',
             success:function(response){
               $('.card-content').html(response);
             },
             error:function(){
                 alert('errore');
             }
         });
    }
    
    function winteler_load_serviceman(el)
    {
        $.ajax({
                url: '<?= controller_url()."winteler_load_serviceman" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
    }
    
    function winteler_load_preventivocarrozzeria(el)
    {
        $.ajax({
                url: '<?= controller_url()."winteler_load_preventivocarrozzeria" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
    }
    
    function winteler_load_autonuove(el)
    {
        $.ajax({
                url: '<?= controller_url()."winteler_load_autonuove" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
    }
    
    function winteler_load_checklist_menu(el)
    {
        var url='<?= controller_url()?>/winteler_load_checklist_menu/';
         $.ajax({
             url: url,
             method: 'url',
             success:function(response){
               $('.card-content').html(response);
             },
             error:function(){
                 alert('errore');
             }
         });
    }
    
    function winteler_load_checklist(el,statoprocesso,fidd)
    {
        var url='<?= controller_url()?>/winteler_load_checklist/'+statoprocesso+'/'+fidd;
         $.ajax({
             url: url,
             method: 'url',
             success:function(response){
               $('.card-content').html(response);
             },
             error:function(){
                 alert('errore');
             }
         });
    }
    
    function winteler_load_test_venditori(el)
    {
        var url='<?= controller_url()?>/winteler_load_test_venditori/';
         $.ajax({
             url: url,
             method: 'url',
             success:function(response){
               $('.card-content').html(response);
             },
             error:function(){
                 alert('errore');
             }
         });
    }
    
    function winteler_load_barcode_test(el)
    {
        $.ajax({
                url: '<?= controller_url()."winteler_load_barcode_test" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
    }
    
    function winteler_load_serviceman_menu(el)
    {
        $.ajax({
                url: '<?= controller_url()."winteler_load_serviceman_menu" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
    }
    
    function winteler_load_serviceman_nuovo(el)
    {
        $.ajax({
                url: '<?= controller_url()."winteler_load_serviceman_nuovo" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
    }
    
    function winteler_load_serviceman_attesaconferma(el)
    {
        $.ajax({
                url: '<?= controller_url()."winteler_load_serviceman_attesaconferma" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
    }
    
    function winteler_load_statistiche(el)
    {
        $.ajax({
                url: '<?= controller_url()."winteler_load_statistiche" ?>',
                method: 'url',
                success:function(response){
                  $('.card-content').html(response);
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
                        <img src="<?=base_url("/assets/images/custom/Winteler/winteler_logo.png")?>">
                    </div>
                    <div class="card-content" style="//background-image:url('<?=base_url("/assets/images/custom/Winteler/mercedes.jpg")?>');background-repeat: no-repeat;background-size: cover; ">
                            
                        <?=$content?>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
  </html>