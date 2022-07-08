
            
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
        
        img{
            width: 200px;
        }
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
        
        function winteler_load_scheda_auto()
       {
            var serialized_data=[];
            serialized_data.push({name: 'barcode', value: $('#barcode').val()});
            $.ajax({
                url: '<?= controller_url()."winteler_load_scheda_auto" ?>',
                data: serialized_data,
                type: 'post',
                success:function(response){

                  $('.card-content').html(response);
                },
                error:function(){
                    alert('errore');
                }
            });
       }
       
       function decode(el)
       {
          
                var src=$(el).closest('div').find('img').attr('src');
                  Quagga.decodeSingle({
                            inputStream: {
                                size: $(el).closest('div').find('.size').val(),
                                singleChannel: false
                            },
                            locator: {
                                patchSize: $(el).closest('div').find('.patchsize').val(),
                                halfSample: false
                            },
                            decoder: {
                                    readers: ["code_128_reader"] // List of active readers
                            },
                            
                            locate: true, // try to locate the barcode in the image
                            src: src // or 'data:image/jpg;base64,' + data
                    }, function(result){
                        console.info('Result:');
                        console.info(result);
                            if(result.codeResult) {
                                alert(result.codeResult.code);

                            } else {
                                alert('not detected');

                            }
                    });
                
       }
        
    </script>
        <div class="container" style="background-color: #fdfdfd">
            <?php
            foreach ($files as $key => $file) {
                if(($file!='.')&&($file!='..'))
                {
                ?>
                    <div  style="border: 1px solid black;padding: 5px;margin: 5px">
                        <img src="<?=domain_url()?>AdiServer/barcode/<?=$file?>" onclick="decode(this)"><br/>
                        <select style="display: block" class="size">
                            <option value="640">640</option>
                            <option value="800" selected="selected">800</option>
                            <option value="1280">1280</option>
                        </select><br/>
                        <select style="display: block" class="patchsize">
                            <option value="medium">medium</option>
                            <option value="large">large</option>
                            <option value="x-large">x-large</option>
                        </select><br/>
                        <button onclick="decode(this)">Decode</button>
                    </div>
            <?php
                }
            }
            ?>
            
          
        </div>
    </body>
  </html>