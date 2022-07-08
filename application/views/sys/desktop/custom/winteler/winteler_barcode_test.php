
  <script type="text/javascript">

       function winteler_load_scheda_auto()
       {
            var serialized_data=[];
            serialized_data.push({name: 'barcode', value: $('#barcode').val()});
            serialized_data.push({name: 'telaio', value: $('#telaio').val()});
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
       
       function winteler_caricabarcodeOLD(el)
       {
           $('#barcode_result').html('Barcode in caricamento');
           var fd = new FormData();
            var files = $('#file-upload')[0].files;
            $.each(files, function(i, file) {
                fd.append('file[]', file);
            });
            $.ajax({
                url: '<?= controller_url()."winteler_caricabarcode" ?>',
                method: 'POST',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response){

                
                  $('#barcode_result').html("Carico:"+response);
                  
                  Quagga.decodeSingle({
                            decoder: {
                                    readers: ["code_128_reader"] // List of active readers
                            },
                            locate: true, // try to locate the barcode in the image
                            src: '<?=domain_url()?>AdiServer/barcode/'+response // or 'data:image/jpg;base64,' + data
                    }, function(result){
                            if(result.codeResult) {
                                $('#barcode_quagga_output').html(result.codeResult.code);
                                $('#barcode').focus();
                                $('#barcode').val(result.codeResult.code);

                            } else {
                                console.log("not detected");
                                $('#quagga_result').html(result.codeResult.code);

                            }
                    });
                   /* 
                  $.ajax({
                        url: '<?= controller_url()?>winteler_barcode_quagga/'+response,
                        method: 'html',
                        success:function(response){

                          $('#barcode_quagga_output').html(response);
                          
                          

                        },
                        error:function(){
                            alert('errore');
                        }
                    });*/
                },
                error:function(){
                    alert('errore');
                }
            });
       }
       
       function decode(filename)
       {
                var returnvar='';
                var src="<?=domain_url()?>AdiServer/barcode_test/"+filename;
                console.info(src);
                Quagga.decodeSingle({
                          inputStream: {
                              size: 800,
                              singleChannel: false
                          },
                          locator: {
                              patchSize: 'medium',
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
                      if(typeof result !== 'undefined')
                      {
                          if(result.codeResult) {
                                $('#barcode_result').append("Risultato old 2:"+result.codeResult.code);
                                

                          } else {
                              $('#barcode_result').append("Risultato old 2: Barcode non riconosciuto");

                          }
                      }else{
                          $('#barcode_result').append("Risultato old 2: Barcode non riconosciuto");
                      }
                  });
       }
       
       function winteler_caricabarcode_test(el)
       {
           
           $('#barcode').val("");
           $('#barcode_result').html('Barcode in caricamento');
           var fd = new FormData();
            var files = $('#file-upload')[0].files;
            $.each(files, function(i, file) {
                fd.append('file[]', file);
            });
            $.ajax({
                url: '<?= controller_url()."winteler_caricabarcode_test" ?>',
                method: 'POST',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response){
                    $('#barcode_result').html("");
                    console.info(response);
                    var responseobj=jQuery.parseJSON( response );
                    var barcodeold1=responseobj.barcodeold1;
                    var barcodenew=responseobj.barcodenew;
                    var filename=responseobj.filename;
                    $('#barcode_result').append("Risultato old 1:"+barcodeold1+"<br/>");
                    $('#barcode_result').append("<b>Risultato new:"+barcodenew+"</b><br/>");
                    decode(filename);
                        
                    
                    
                    
                  
                  
                },
                error:function(){
                    alert('errore');
                }
            });
       } 
        
    </script>

        <div class="input-field col s12">
            <div class="btn">
                <label for="file-upload" class="custom-file-upload">
                    <i class="fa fa-cloud-upload"></i> Foto barcode
                </label>
                <input id="file-upload" type="file" accept="image/*" capture multiple onchange="winteler_caricabarcode_test(this)"/>
            </div>

        </div>
    <div id="barcode_result" >
        
    </div>
    <div id="barcode_quagga_output">
        
    </div>
    <div class="input-field col s12">
        <input id="barcode" type="text" class="validate">
        <label for="barcode">Barcode</label>
    </div>

 
    
    
    <div class="row" >
      <div class='btn' onclick="winteler_load_menu(this)">Menu</div>
    </div>
