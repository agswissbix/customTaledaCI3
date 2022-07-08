
 
    <script type="text/javascript">
        var files=[];
       $(document).ready(function(){
            $('select').formSelect();
    

            $('.datepicker').datepicker();
            $('.timepicker').timepicker();
            
        
        });
  
        
        
    $('#file-upload').change(function() {
        var input=this;
        console.info('input.files:');
        console.info(input.files);
        if (input.files && input.files[0]) {
            files.push(input.files[0]);
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgautoprimacontent=$('<img  style="height: 100px;width: 100px;" src="'+e.target.result+'"/>');
                $('#allegati').append(imgautoprimacontent);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
    
    function salva_serviceman(el)
    {
        var fd = new FormData();
        $.each(files, function(i, file) {
                fd.append('file[]', file);
            });
        fd.append('nomeutente',$('#nomeutente').val());
        fd.append('nome',$('#Nome').val());
        fd.append('cognome',$('#Cognome').val());
        fd.append('telefono',$('#Telefono').val());
        fd.append('email',$('#Email').val());
        fd.append('targa',$('#Targa').val());
        fd.append('telaio',$('#Telaio').val());
        fd.append('modello',$('#Modello').val());
        fd.append('data',$('#data').val());
        fd.append('ora',$('#ora').val());
        $.ajax({
            url: '<?= controller_url()."winteler_salva_serviceman" ?>',
            method: 'POST',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){

              //$('html').html(response);
              winteler_load_conferma_salvataggio(el);
            },
            error:function(){
                alert('errore');
            }
        });
    }
        
        
    </script>

    <div class="row">
        <?php
        $cognome='';
        $active='';
        ?>
        
        <div class="input-field col s12">
            <input id="Nome" type="text" class="validate" >
            <label class="<?=$active?>"  for="Nome">Nome cliente</label>
        </div>
        <div class="input-field col s12">
            <input id="Cognome" type="text" class="validate">
            <label class="<?=$active?>"  for="Cognome">Cognome cliente</label>
        </div>
        <div class="input-field col s12">
            <input id="Telefono" type="text" class="validate" >
            <label class="<?=$active?>"  for="Telefono">Telefono</label>
        </div>
        <div class="input-field col s12">
            <input id="Email" type="text" class="validate" >
            <label class="<?=$active?>"  for="Email">Email</label>
        </div>
        <div class="input-field col s12">
            <input id="Targa" type="text" class="validate" >
            <label class="<?=$active?>"  for="Targa">Targa</label>
        </div>
        <div class="input-field col s12">
            <input id="Telaio" type="text" class="validate" >
            <label class="<?=$active?>"  for="Telaio">Telaio</label>
        </div>
        <div class="input-field col s12">
            <input id="Modello" type="text" class="validate">
            <label class="<?=$active?>"  for="Modello">Modello</label>
        </div>
        <div class="input-field col s12">
            <input id="data" type="text" class="validate datepicker">
            <label  for="data">Data</label>
        </div>
        <div class="input-field col s12">
            <input id="ora" type="text" class="validate timepicker">
            <label  for="ora">Ora</label>
        </div>
        <div class="input-field col s12">
            <input id="nomeutente" type="text" class="validate" >
            <label class="<?=$active?>"  for="nomeutente">Utente</label>
        </div>
        <div class="input-field col s12">
            <div class="btn">
                <label for="file-upload" class="custom-file-upload">
                    <i class="fa fa-cloud-upload"></i> Carica foto
                </label>
                <input id="file-upload" type="file" accept="image/*" capture multiple/>
            </div>
            <div id="allegati">
                      
            </div>

        </div>
        <div class="input-field col s12" >
            <a style="width: 100%" class="waves-effect waves-light btn" onclick="salva_serviceman(this)">Salva</a>
        </div>
        <div class="row" >
            <div class='btn' onclick="winteler_load_menu(this)">Menu</div>
        </div>
    </div>
                    