
 
    <script type="text/javascript">

       $(document).ready(function(){
            $('select').formSelect();
    
    
        });
  
    function salva_notespese(el)
    {
        var fd = new FormData();
        var files = $('#file-upload')[0].files;
        $.each(files, function(i, file) {
            fd.append('file[]', file);
        });
        fd.append('tipo',$('#tipo').val());
        fd.append('importo',$('#importo').val());
        fd.append('note',$('#note').val());
        $.ajax({
            url: '<?= controller_url()."winteler_salva_notespese" ?>',
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
        <div class="input-field col s12">
            <select id="tipo">
              <option value="" disabled selected>Tipo</option>
              <option value="1">Benzina</option>
              <option value="2">Pranzo</option>
              <option value="3">Altro</option>
            </select>
            <label>Materialize Select</label>
        </div>
        <div class="input-field col s12">
            <input id="importo" type="number" class="validate">
            <label for="importo">Importo</label>
        </div>
        <div class="input-field col s12">
            <textarea id="note" class="materialize-textarea"></textarea>
            <label for="note">Note</label>
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
            <a style="width: 100%" class="waves-effect waves-light btn" onclick="salva_notespese(this)">Salva</a>
        </div>
        <div class="row" >
            <div class='btn' onclick="winteler_load_menu(this)">Menu</div>
        </div>
    </div>
                    