
 
    <script type="text/javascript">
        var files=[];
       $(document).ready(function(){
            $('select').formSelect();
            $('.collapsible').collapsible();
            $('.datepicker').datepicker({
                format: 'yyyy.mm.dd'
            });
    
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
    
    
    function salva_checklist(el)
    {
        
        
        /*var fd = new FormData();
        var files = $('#file-upload')[0].files;
        $.each(files, function(i, file) {
            fd.append('file[]', file);
        });
        
        $('.field').each(function(i,el){
            fd.append('fields['+$(el).attr('id')+']',$(el).val());
        }
        )
           */
          
        /*fd = $('#checklist').serializeArray();
        var files = $('#file-upload')[0].files;
        $.each(files, function(i, file) {
            fd.append('file[]', file);
        });
        */
       
        var form_data = new FormData($('#checklist')[0]);
        //var form_data = new FormData();
        $.each(files, function(i, file) {
            form_data.append('files[]', file);
        });
        
        $(el).closest('.card-content').html('Salvataggio in corso...');
        
        $.ajax({
            type: "POST",
            url: '<?= controller_url()."winteler_salva_checklist" ?>',
            data: form_data,
            processData: false,
            contentType: false,
            success:function(response){

              //$('html').html(response);
              console.info(response);
              winteler_load_conferma_salvataggio(el);
            },
            error:function(){
                alert('errore');
            }
        });
    }
        
        
    </script>

    
    
    <div class="row">
        <form id="checklist">
        <?php
        $active='';
        ?>
        
        
        <ul class="collapsible">
            
            <li class="active">
                <div class="collapsible-header" >Dati cliente</div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="F1070nomedetentore" type="text" class="validate field" name="F1070nomedetentore" >
                            <label class="<?=$active?>"  for="F1070nomedetentore">Nome detentore</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="F1134via" type="text" class="validate field" name="F1134via" >
                            <label class="<?=$active?>"  for="F1134via">Indirizzo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="F1136telefono" type="text" class="validate field" name="F1136telefono" >
                            <label class="<?=$active?>"  for="F1136telefono">Telefono</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="F1146email" type="text" class="validate field" name="F1146email" >
                            <label class="<?=$active?>"  for="F1146email">Email</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <select id="F1050venditore" class="field" name="F1050venditore">
                                <option value="" disabled selected></option>
                                <?php
                                    foreach ($venditori as $key => $venditore) {
                                        ?>
                                        <option value="<?=$venditore['FIUS']?>"><?=$venditore['FSGL']?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                            <label>Venditore</label>
                        </div>
                        
                    </div>
                    

                </div>
            </li>
            <li>
                <div class="collapsible-header">Dati vettura</div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="F1011marca" type="text" class="validate field" name="F1011marca" >
                            <label class="<?=$active?>"  for="F1011marca">Marca</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="F1012modello" type="text" class="validate field" name="F1012modello" >
                            <label class="<?=$active?>"  for="F1012modello">Modello</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="F1013telaio" type="text" class="validate field" name="F1013telaio" >
                            <label class="<?=$active?>"  for="F1013telaio">Telaio</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="F1014targa" type="text" class="validate field" name="F1014targa" >
                            <label class="<?=$active?>"  for="F1014targa">Targa</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="F1174km" type="text" class="validate field" name="F1174km" >
                            <label class="<?=$active?>"  for="F1174km">KM</label>
                        </div>
                    </div>
                </div>
            </li>
            <li >
                <div class="collapsible-header">Controllo officina</div>
                <div class="collapsible-body">                    
                    <div style="border: 1px solid black;margin-top: 20px;">
                        <b>PNEUMATICI</b>
                        <div class="row">
                            <div class="col s6">
                                ANT SX <br/>
                                <div class="input-field col s12">
                                    <input id="F1263pneumatici_antsx_mm" type="text" class="validate field" name="F1263pneumatici_antsx_mm" >
                                    <label class="<?=$active?>"  for="F1263pneumatici_antsx_mm">mm</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="F1264pneumatici_antsx_data" type="text" class="validate field datepicker" style="color:#9e9e9e" name="F1264pneumatici_antsx_data" >
                                    <label class="<?=$active?>"  for="F1264pneumatici_antsx_data">Data</label>
                                </div>
                            </div>
                            <div class="col s6">
                                ANT DX <br/>
                                <div class="input-field col s12">
                                    <input id="F1265pneumatici_antdx_mm" type="text" class="validate field " name="F1265pneumatici_antdx_mm" >
                                    <label class="<?=$active?>"  for="F1265pneumatici_antdx_mm">mm</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="F1266pneumatici_antdx_data" type="text" class="validate field datepicker" style="color:#9e9e9e" name="F1266pneumatici_antdx_data" >
                                    <label class="<?=$active?>"  for="F1266pneumatici_antdx_data">Data</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                POST SX <br/>
                                <div class="input-field col s12">
                                    <input id="F1267pneumatici_postsx_mm" type="text" class="validate field" name="F1267pneumatici_postsx_mm" >
                                    <label class="<?=$active?>"  for="F1267pneumatici_postsx_mm">mm</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="F1268pneumatici_postsx_data" type="text" class="validate field datepicker" style="color:#9e9e9e" name="F1268pneumatici_postsx_data" >
                                    <label class="<?=$active?>"  for="F1268pneumatici_postsx_data">Data</label>
                                </div>
                            </div>
                            <div class="col s6">
                                POST DX <br/>
                                <div class="input-field col s12">
                                    <input id="F1269pneumatici_postdx_mm" type="text" class="validate field" name="F1269pneumatici_postdx_mm" >
                                    <label class="<?=$active?>"  for="F1269pneumatici_postdx_mm">mm</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="F1270pneumatici_postdx_data" type="text" class="validate field datepicker" style="color:#9e9e9e" name="F1270pneumatici_postdx_data" >
                                    <label class="<?=$active?>"  for="F1270pneumatici_postdx_data">Data</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="border: 1px solid black;margin-top: 20px;">
                        <b>CERCHI</b>
                        <div class="row">
                            <div class="col s6">
                                ANT SX <br/>
                                <div class="row">
                                    <div class="col s4"  >
                                        <label>
                                            <input id="F1271cerchi_antsx_stato" name="F1271cerchi_antsx_stato" type="radio" class="field" value="ok" name="F1271cerchi_antsx_stato" />
                                            <span style="padding-left: 20px;">ok</span>
                                        </label>
                                    </div>
                                    <div class="col s8" >
                                        <label>
                                            <input id="F1271cerchi_antsx_stato" name="F1271cerchi_antsx_stato" type="radio" class="field" value="ok" name="F1271cerchi_antsx_stato" />
                                            <span style="padding-left: 20px;">non ok</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6">
                                ANT DX <br/>
                                <div class="row">
                                    <div class="col s4" ">
                                        <label>
                                            <input id="F1272cerchi_antdx_stato" name="F1272cerchi_antdx_stato" type="radio" class="field" value="ok" name="F1272cerchi_antdx_stato"  />
                                            <span style="padding-left: 20px;">ok</span>
                                        </label>
                                    </div>
                                    <div class="col s8" >
                                        <label>
                                            <input id="F1272cerchi_antdx_stato" name="F1272cerchi_antdx_stato" type="radio" class="field" value="non ok" name="F1272cerchi_antdx_stato" />
                                            <span style="padding-left: 20px;">non ok</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                POST SX <br/>
                                <div class="row">
                                    <div class="col s4">
                                        <label>
                                            <input id="F1273cerchi_postsx_stato" name="F1273cerchi_postsx_stato" type="radio" class="field" value="ok" name="F1273cerchi_postsx_stato"  />
                                            <span style="padding-left: 20px;">ok</span>
                                        </label>
                                    </div>
                                    <div class="col s8">
                                        <label>
                                            <input id="F1273cerchi_postsx_stato" name="F1273cerchi_postsx_stato" type="radio" class="field" value="non ok" name="F1273cerchi_postsx_stato" />
                                            <span style="padding-left: 20px;">non ok</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6">
                                POST DX <br/>
                                <div class="row">
                                    <div class="col s4">
                                        <label>
                                            <input id="F1274cerchi_postdx_stato" name="F1274cerchi_postdx_stato" type="radio" class="field" value="ok" name="F1274cerchi_postdx_stato"  />
                                            <span style="padding-left: 20px;">ok</span>
                                        </label>
                                    </div>
                                    <div class="col s8">
                                        <label>
                                            <input id="F1274cerchi_postdx_stato" name="F1274cerchi_postdx_stato" type="radio" class="field" value="non ok" name="F1274cerchi_postdx_stato" />
                                            <span style="padding-left: 20px;">non ok</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div style="border: 1px solid black;margin-top: 20px;">
                        <b>FRENI</b>
                        <div class="row">
                            <div class="col s6">
                                ANT SX <br/>
                                <div class="input-field col s8 offset-s2">
                                    <input id="F1275freni_antsx_perc" type="text" class="validate field" name="F1275freni_antsx_perc" >
                                    <label class="<?=$active?>"  for="F1275freni_antsx_perc">%</label>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <label>
                                            <input id="F1276freni_antsx_stato" name="F1276freni_antsx_stato" type="radio" class="field" name="F1276freni_antsx_stato" value="ok"  />
                                            <span style="padding-left: 20px;">ok</span>
                                        </label>
                                    </div>
                                    <div class="col s8">
                                        <label>
                                            <input id="F1276freni_antsx_stato" name="F1276freni_antsx_stato" type="radio" class="field" name="F1276freni_antsx_stato" value="sost" />
                                            <span style="padding-left: 20px;">sost</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6">
                                ANT DX<br/>
                                <div class="input-field col s8 offset-s2">
                                    <input id="F1277freni_antdx_perc" type="text" class="validate field" name="F1277freni_antdx_perc" >
                                    <label class="<?=$active?>"  for="F1277freni_antdx_perc">%</label>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <label>
                                            <input id="F1278freni_antdx_stato" name="F1278freni_antdx_stato" type="radio" class="field" name="F1278freni_antdx_stato" value="ok" />
                                            <span style="padding-left: 20px;">ok</span>
                                        </label>
                                    </div>
                                    <div class="col s8">
                                        <label>
                                            <input id="F1278freni_antdx_stato" name="F1278freni_antdx_stato" type="radio" class="field" name="F1278freni_antdx_stato" value="sost" />
                                            <span style="padding-left: 20px;">sost</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                POST SX <br/>
                                <div class="input-field col s8 offset-s2">
                                    <input id="F1279freni_postsx_perc" type="text" class="validate field" name="F1279freni_postsx_perc" >
                                    <label class="<?=$active?>"  for="F1279freni_postsx_perc">%</label>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <label>
                                            <input id="F1280freni_postsx_stato" name="F1280freni_postsx_stato" type="radio" class="field" name="F1280freni_postsx_stato" value="ok" />
                                            <span style="padding-left: 20px;">ok</span>
                                        </label>
                                    </div>
                                    <div class="col s8">
                                        <label>
                                            <input id="F1280freni_postsx_stato" name="F1280freni_postsx_stato" type="radio" class="field" name="F1280freni_postsx_stato" value="sost" />
                                            <span style="padding-left: 20px;">sost</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6">
                                POST DX<br/>
                                <div class="input-field col s8 offset-s2">
                                    <input id="F1281freni_postdx_perc" type="text" class="validate field" name="F1281freni_postdx_perc" >
                                    <label class="<?=$active?>"  for="F1281freni_postdx_perc">%</label>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <label>
                                            <input id="F1282freni_postdx_stato" name="F1282freni_postdx_stato" type="radio" class="field" name="F1282freni_postdx_stato" value="ok"  />
                                            <span style="padding-left: 20px;">ok</span>
                                        </label>
                                    </div>
                                    <div class="col s8">
                                        <label>
                                            <input id="F1282freni_postdx_stato" name="F1282freni_postdx_stato" type="radio" class="field" name="F1282freni_postdx_stato" value="sost" />
                                            <span style="padding-left: 20px;">sost</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div style="border: 1px solid black;margin-top: 20px;">
                        <b>MOTORE / CAMBIO</b>
                        <div class="row">
                            <div class="col s6">
                                PERDITE OLIO <br/>
                                <div class="row">
                                    <div class="col s6">
                                        <label>
                                            <input id="F1283perditeolio" name="F1283perditeolio" type="radio" class="field" value="si"   />
                                            <span style="padding-left: 25px;">si</span>
                                        </label>
                                    </div>
                                    <div class="col s6">
                                        <label>
                                            <input id="F1283perditeolio"  name="F1283perditeolio" type="radio" class="field" value="no"  />
                                            <span style="padding-left: 25px;">no</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="input-field col s8 offset-s2">
                                    <input id="F1301perditeolio_dove" name="F1301perditeolio_dove" type="text" class="validate" >
                                    <label class="<?=$active?>"  for="F1301perditeolio_dove">Dove</label>
                                </div>
                            </div>
                            <div class="col s6">
                                PERDITE LIQUIDO <br/>
                                <div class="row">
                                    <div class="col s6">
                                        <label>
                                            <input id="F1284perditeliquido" name="F1284perditeliquido" type="radio" class="field" value="si"  />
                                            <span style="padding-left: 25px;">si</span>
                                        </label>
                                    </div>
                                    <div class="col s6">
                                        <label>
                                            <input id="F1284perditeliquido" name="F1284perditeliquido" type="radio" class="field" value="no" />
                                            <span style="padding-left: 25px;">no</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="input-field col s8 offset-s2">
                                    <input id="F1302perditeliquido_dove" name="F1302perditeliquido_dove" type="text" class="validate" >
                                    <label class="<?=$active?>"  for="F1302perditeliquido_dove">Dove</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div style="border: 1px solid black;margin-top: 20px;">
                        <b>ASSALE</b>
                        <div class="row">
                            <div class="col s6">
                                ANTERIORE <br/>
                                <div class="row">
                                    <div class="col s6">
                                        <label>
                                            <input id="F1285assale_anteriore" name="F1285assale_anteriore" type="radio"  class="field" value="si" />
                                            <span style="padding-left: 25px;">si</span>
                                        </label>
                                    </div>
                                    <div class="col s6">
                                        <label>
                                            <input id="F1285assale_anteriore" name="F1285assale_anteriore" type="radio" class="field" value="no" />
                                            <span style="padding-left: 25px;">no</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="input-field col s8 offset-s2">
                                    <input id="F1286assale_anteriore_dove" name="F1286assale_anteriore_dove" type="text" class="validate field" >
                                    <label class="<?=$active?>"  for="F1286assale_anteriore_dove">Dove</label>
                                </div>
                            </div>
                            <div class="col s6">
                                POSTERIORE <br/>
                                <div class="row">
                                    <div class="col s6">
                                        <label>
                                            <input id="F1287assale_posteriore" name="F1287assale_posteriore" type="radio" class="field" value="si"  />
                                            <span style="padding-left: 25px;">si</span>
                                        </label>
                                    </div>
                                    <div class="col s6">
                                        <label>
                                            <input id="F1287assale_posteriore" name="F1287assale_posteriore" type="radio" class="field" value="no" />
                                            <span style="padding-left: 25px;">no</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="input-field col s8 offset-s2">
                                    <input id="F1288assale_posteriore_dove" name="F1288assale_posteriore_dove" type="text" class="validate field" >
                                    <label class="<?=$active?>"  for="F1288assale_posteriore_dove">Dove</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div style="border: 1px solid black;margin-top: 20px;">
                        <b>PARABREZZA</b>
                        <div class="row">
                            <div class="col s6">
                                DANNI <br/>
                                <div class="row">
                                    <div class="col s6">
                                        <label>
                                            <input id="F1289parabrezza_danni"  name="F1289parabrezza_danni" type="radio" class="field" value="si"  />
                                            <span style="padding-left: 25px;">si</span>
                                        </label>
                                    </div>
                                    <div class="col s6">
                                        <label>
                                            <input id="F1289parabrezza_danni" name="F1289parabrezza_danni" type="radio" class="field" value="no" />
                                            <span style="padding-left: 25px;">no</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6">
                                SOSTITUZIONE <br/>
                                <div class="row">
                                    <div class="col s6">
                                        <label>
                                            <input id="F1290parabrezza_sostituzione" name="F1290parabrezza_sostituzione" type="radio" class="field" value="si"  />
                                            <span style="padding-left: 25px;">si</span>
                                        </label>
                                    </div>
                                    <div class="col s6">
                                        <label>
                                            <input id="F1290parabrezza_sostituzione" name="F1290parabrezza_sostituzione" type="radio" class="field" value="no" />
                                            <span style="padding-left: 25px;">no</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
 
                    </div>
                    
                    <div style="border: 1px solid black;margin-top: 20px;">
                        <b>BATTERIA</b>
                        <div class="row">
                            <div class="col s6">
                                AVVIAMENTO <br/>
                                <div class="row">
                                    <div class="col s4">
                                        <label>
                                            <input id="F1291batteria_avviamento_stato" name="F1291batteria_avviamento_stato" type="radio" class="field" value="ok"  />
                                            <span style="padding-left: 20px;">ok</span>
                                        </label>
                                    </div>
                                    <div class="col s8">
                                        <label>
                                            <input id="F1291batteria_avviamento_stato" name="F1291batteria_avviamento_stato" type="radio" class="field" value="sost" />
                                            <span style="padding-left: 20px;">sost</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6">
                                SECONDARIA <br/>
                                <div class="row">
                                    <div class="col s6">
                                        <label>
                                            <input id="F1292batteria_secondaria_stato"  name="F1292batteria_secondaria_stato" type="radio" class="field" value="ok"  />
                                            <span style="padding-left: 25px;">ok</span>
                                        </label>
                                    </div>
                                    <div class="col s6">
                                        <label>
                                            <input id="F1292batteria_secondaria_stato" name="F1292batteria_secondaria_stato" type="radio" class="field" value="sost" />
                                            <span style="padding-left: 25px;">sost</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div style="border: 1px solid black;margin-top: 20px;">
                        <b>TEST BREVE</b>
                            <div class="row">
                                <div class="col s6">
                                    <label>
                                        <input id="F1293test_breve" name="F1293test_breve" type="radio" class="field" value="si" />
                                        <span style="padding-left: 25px;">si</span>
                                    </label>
                                </div>
                                <div class="col s6">
                                    <label>
                                        <input id="F1293test_breve" name="F1293test_breve" type="radio" class="field" value="no" />
                                        <span style="padding-left: 25px;">no</span>
                                    </label>
                                </div>
                            </div>
                    </div>
                    
                    <div style="border: 1px solid black;margin-top: 20px;">
                        <b>MSI PLUS</b>
                            <div class="row">
                                <div class="col s6">
                                    <label>
                                        <input id="F1294msi_plus" name="F1294msi_plus" type="radio" class="field" value="si"  />
                                        <span style="padding-left: 25px;">si</span>
                                    </label>
                                </div>
                                <div class="col s6">
                                    <label>
                                        <input id="F1294msi_plus" name="F1294msi_plus" type="radio" class="field" value="no" />
                                        <span style="padding-left: 25px;">no</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field col s12">
                                        <input id="F1295msiplus_scadenza" name="F1295msiplus_scadenza" type="text" class="validate field datepicker" style="color:#9e9e9e" >
                                        <label class="<?=$active?>"  for="F1295msiplus_scadenza">Scadenza</label>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    
                    <div style="border: 1px solid black;margin-top: 20px;">
                        <b>STARCLASS</b>
                            <div class="row">
                                <div class="col s6">
                                    <label>
                                        <input id="F1296starclass" name="F1296starclass" type="radio" class="field" value="si"  />
                                        <span style="padding-left: 25px;">si</span>
                                    </label>
                                </div>
                                <div class="col s6">
                                    <label>
                                        <input id="F1296starclass" name="F1296starclass" type="radio" class="field" value="no" />
                                        <span style="padding-left: 25px;">no</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field col s12">
                                        <input id="F1297starclass_scadenza" name="F1297starclass_scadenza" type="text" class="validate field datepicker" style="color:#9e9e9e" >
                                        <label class="<?=$active?>"  for="F1297starclass_scadenza">Scadenza</label>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    
                    
                    
                    <div style="border: 1px solid black;margin-top: 20px;">
                        <b>OSSERVAZIONI</b>
                        <textarea id="F1234osservazioni_officina" name="F1234osservazioni_officina" class="materialize-textarea field"></textarea>
                        <br/>
                        <b>STIMA COSTI</b>
                        <textarea id="F1298stimacosti_officina" name="F1298stimacosti_officina" class="materialize-textarea"></textarea>                        
                    </div>
                    
                    
                    
                    
 
                
            </li>
            <li>
                <div class="collapsible-header">Controllo carrozzeria</div>
                <div class="collapsible-body">
                    <div style="border: 1px solid black;margin-top: 20px;">
                        <b>GRANDINATA</b>
                        <div class="row">
                            <div class="col s6">
                                <label>
                                    <input id="F1300grandinata" name="F1300grandinata" type="radio" class="field" value="si"  />
                                    <span style="padding-left: 25px;">si</span>
                                </label>
                            </div>
                            <div class="col s6">
                                <label>
                                    <input id="F1300grandinata" name="F1300grandinata" type="radio" class="field" value="no" />
                                    <span style="padding-left: 25px;">no</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div style="border: 1px solid black;margin-top: 20px;">
                        <b>OSSERVAZIONI</b>
                        <textarea id="F1233osservazioni_carrozzeria" name="F1233osservazioni_carrozzeria" class="materialize-textarea field"></textarea>
                        <br/>
                        <b>STIMA COSTI</b>
                        <textarea id="F1299stimacosti_carrozzeria" name="F1299stimacosti_carrozzeria" class="materialize-textarea"></textarea>
                    </div>
                </div>
            </li>
        </ul>
        
        
        
        <div class="input-field col s12">
            <div class="btn">
                <label for="file-upload" class="custom-file-upload">
                    <i class="fa fa-cloud-upload"></i> Carica foto
                </label>
                <input id="file-upload" name="files" type="file" accept="image/*" capture multiple/>
            </div>
            <div id="allegati">
                      
            </div>
        </div>
        
        <div class="input-field col s12" >
            <a style="width: 100%" class="waves-effect waves-light btn" onclick="salva_checklist(this)">Salva</a>
        </div>
        <div class="row" >
            <div class='btn' onclick="winteler_load_menu(this)">Menu</div>
        </div>
        </form>
    </div>
                    