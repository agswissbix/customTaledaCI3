
 
    <script type="text/javascript">

       $(document).ready(function(){
            $('select').formSelect();
    
    
        });
  
    function salva_autonuova(el)
    {
        var fd = new FormData();
        var files = $('#file-upload')[0].files;
        $.each(files, function(i, file) {
            fd.append('file[]', file);
        });
        fd.append('nomeutente',$('#nomeutente').val());
        fd.append('telaio',$('#Telaio').val());
        fd.append('modello',$('#Modello').val());
        $.ajax({
            url: '<?= controller_url()."winteler_salva_autonuova" ?>',
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
        $active='';
        ?>
        
        <div class="input-field col s12">
            <input id="Telaio" type="text" class="validate" >
            <label class="<?=$active?>"  for="Telaio">Telaio</label>
        </div>
        <div class="input-field col s12">
            <input id="Modello" type="text" class="validate" >
            <label class="<?=$active?>"  for="Modello">Modello</label>
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

        </div>
        <div class="input-field col s12" >
            <a style="width: 100%" class="waves-effect waves-light btn" onclick="salva_autonuova(this)">Salva</a>
        </div>
        <div class="row" >
            <div class='btn' onclick="winteler_load_menu(this)">Menu</div>
        </div>
    </div>
                    