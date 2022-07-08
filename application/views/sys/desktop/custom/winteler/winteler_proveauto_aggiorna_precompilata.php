 
<?php
$active='';
if($fidd!='')
{
    $active='active';
}
?>
    <script type="text/javascript">
    var files_autodopo=[];
  
    
    function salva_proveauto_aggiorna_precompilata(el)
    {
        var fd = new FormData();
        //var files = $('#file-upload-patente')[0].files;
 
        $.each(files_autodopo, function(i, file) {
            fd.append('file[autodopo][]', file);
        });
        fd.append('fidd',"<?=$fidd?>");
        fd.append('statoprocesso',"Precompilata");
        
        fd.append('cognome',$('#cognome').val());
        fd.append('nome',$('#nome').val());
        fd.append('email',$('#email').val());
        fd.append('via',$('#via').val());
        fd.append('cap',$('#cap').val());
        fd.append('citta',$('#citta').val());
        fd.append('telefono',$('#telefono').val());
        fd.append('barcode',$('#barcode').val());
        fd.append('telaio',$('#telaio').val());
        fd.append('modello',$('#modello').val());
        fd.append('targa',$('#targa').val());
        fd.append('kmpartenza',$('#kmpartenza').val());
        fd.append('datapartenza',$('#datapartenza').val());
        fd.append('orapartenza',$('#orapartenza').val());

        fd.append('kmarrivo',$('#kmarrivo').val());
        fd.append('dataarrivo',$('#dataarrivo').val());
        fd.append('oraarrivo',$('#oraarrivo').val());
        $.ajax({
            url: '<?= controller_url()."winteler_salva_prove" ?>',
            method: 'POST',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){

              winteler_load_proveauto(this);
            },
            error:function(){
                alert('errore');
            }
        });
        
    }
    
    $('#file-upload-autodopo').change(function() {
        var input=this;
        if (input.files && input.files[0]) {
            files_autodopo.push(input.files[0]);
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgautodopo').attr('src', e.target.result); //img element
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
        
        $(document).ready(function(){
            
            $('select').formSelect();
            $('.collapsible').collapsible();
            $('.datepicker').datepicker();
            $('.timepicker').timepicker();
            
          });

          
    </script>
    
    <ul class="collapsible">
    <li>
      <div class="collapsible-header">Dati auto</div>
      <div class="collapsible-body">
          <div class="row">
                <div class="input-field col s12 ">
                    <div class="btn">
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> Foto barcode
                        </label>
                        <input id="file-upload" type="file" accept="image/*" capture multiple onchange="winteler_caricabarcode(this)"/>
                    </div>
                </div>
          </div>
          <div class="row">
                <div class="input-field col s6">
                    <input id="barcode" type="text" class="validate" value="<?=$barcode?>">
                    <label for="barcode">Barcode</label>
                </div>
              <div class="input-field col s6">
                    <div class='btn' onclick="">Cerca</div>
                </div>
                
            <div class="input-field col s12">
                    <input id="modello" type="text" class="validate" value="<?=$modello?>">
                    <label class="<?=$active?>" for="modello">Modello</label>
              </div>
              <div class="input-field col s12">
                  <input id="targa" type="text" class="validate" value="<?=$targa?>">
                  <label class="<?=$active?>" for="targa">Targa</label>
              </div>
          </div>
      </div>
    </li>
    <li>
      <div class="collapsible-header">Dati cliente</div>
      <div class="collapsible-body">
          <div class="row">
                    <div class="input-field col s12">
                        <input id="cognome" type="text" class="validate" value="<?=$cognome?>">
                        <label class="<?=$active?>" for="cognome">Cognome</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="nome" type="text" class="validate " value="<?=$nome?>">
                        <label class="<?=$active?>" for="nome">Nome</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="via" type="text" class="validate" value="<?=$via?>">
                        <label class="<?=$active?>" for="via">Via / N. Civico</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="cap" type="text" class="validate" value="<?=$cap?>">
                        <label class="<?=$active?>" for="cap">Cap</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="citta" type="text" class="validate" value="<?=$citta?>">
                        <label class="<?=$active?>" for="citta">Città</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="telefono" type="text" class="validate" value="<?=$telefono?>">
                        <label class="<?=$active?>" for="telefono">Telefono</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="last_name" type="text" class="validate" value="<?=$email?>">
                        <label class="<?=$active?>" for="last_name">Mail</label>
                    </div>
                    <div class="input-field col s12">
                                <div class="btn">
                                    <label for="file-upload-patente" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Foto patente
                                    </label>
                                    <input id="file-upload-patente" type="file" accept="image/*" capture multiple/>
                                </div>
                        <img id="imgpatente" style="height: 100px;width: 100px;"/>

                            </div>
          </div>
      </div>
    </li>
    <li>
      <div class="collapsible-header">Situazione partenza</div>
      
      <div class="collapsible-body">
          <div class="row">
          <div class="input-field col s12">
            <input id="kmpartenza" type="number" class="validate" value="<?=$kmpartenza?>">
            <label class="<?=$active?>" for="kmpartenza">Km partenza</label>
        </div>
        <div class="input-field col s12">
            <input id="datapartenza" type="text" class="validate datepicker" value="<?=$datapartenza?>">
            <label class="<?=$active?>" for="datapartenza">Data partenza</label>
        </div>
        <div class="input-field col s12">
            <input id="orapartenza" type="text" class="validate timepicker" value="<?=$orapartenza?>">
            <label class="<?=$active?>" for="orapartenza">Ora partenza</label>
        </div>
          <div class="input-field col s12">
                                <div class="btn">
                                    <label for="file-upload-autoprima" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Foto auto Prima
                                    </label>
                                    <input id="file-upload-autoprima" type="file" accept="image/*" capture multiple/>
                                </div>

                            </div>
      </div>
      </div>
    </li>
  </ul>
    <div class="input-field col s12">
                                <textarea id="textarea1" class="materialize-textarea"></textarea>
                                <label class="<?=$active?>" for="textarea1">Note</label>
                            </div>
        
                            
                            
                            
                            
                            
                            
                            
                            
                             
                            
                            
                            <div class="input-field col s12" >
                                <a  style="width: 100%" class="waves-effect waves-light btn" onclick="salva_proveauto_aggiorna_precompilata(this)">Salva</a>
                            </div>
                            <div class="row" >
                                <div class='btn' onclick="winteler_load_menu(this)">Menu</div>
                            </div>
                        </div>