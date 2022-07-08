<style type="text/css">
    input {
    border: 2px solid currentcolor;
  }
  input:invalid {
    border: 2px dashed red !important;
  }
</style>
    <script type="text/javascript">
    var files_patente=[];
    var files_autoprima=[];
  
    function winteler_get_dati_auto()
       {
            var serialized_data=[];
            var barcode=$('#barcode').val();
            var telaio=$('#telaio').val();
            if(((barcode=='')&&(telaio.length>4))||((telaio=='')&&(barcode.length>4)))
            {
                serialized_data.push({name: 'barcode', value: barcode});
                serialized_data.push({name: 'telaio', value: telaio});
                $.ajax({
                    url: '<?= controller_url()."winteler_get_dati_auto" ?>',
                    data: serialized_data,
                    type: 'post',
                    success:function(response){
                        var responseobj=jQuery.parseJSON( response );
                        var result=responseobj.result;
                        if(result=='ok')
                        {
                            var barcode=responseobj.barcode;
                            $('#barcode').val(barcode);

                            var telaio=responseobj.telaio;
                            $('#telaio').val(telaio);

                            var modello=responseobj.modello;
                            $('#modello').val(modello);
                        }   
                        else
                        {
                            alert('nessun risultato');
                        }
                    },
                    error:function(){
                        alert('errore');
                    }
                });
            }
            else
            {
                alert('Inserire almeno 5 caratteri');
            }
       }
  
    function salva_prove(el)
    {
        
        if($('#condizioni').prop('checked'))
        {
            var telefono=$('#telefono').val();
            if((telefono!='')&&(telefono!=null))
            {
                var prefix=telefono.charAt(0);
                if(prefix=='+')
                {
                    telefono=telefono.replace(/\s/g, "");
                    var fd = new FormData();
                    //var files = $('#file-upload-patente')[0].files;
                    console.info('files_patente:');
                    console.info(files_patente);

                    $.each(files_patente, function(i, file) {
                        fd.append('file[patente][]', file);
                    });
                    $.each(files_autoprima, function(i, file) {
                        fd.append('file[autoprima][]', file);
                    });
                    fd.append('cognome',$('#cognome').val());
                    fd.append('nome',$('#nome').val());
                    fd.append('email',$('#email').val());
                    fd.append('via',$('#via').val());
                    fd.append('cap',$('#cap').val());
                    fd.append('citta',$('#citta').val());
                    fd.append('telefono',telefono);
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
                    fd.append('note',$('#note').val());
                    if($('#precompilata').prop('checked'))
                    {
                        fd.append('precompilata','true');
                    }
                    else
                    {
                        fd.append('precompilata','false');
                    }

                    $('.card-content').html('Salvataggio in corso...');
                    $.ajax({
                        url: '<?= controller_url()."winteler_salva_prove" ?>',
                        method: 'POST',
                        data: fd,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(response){

                          winteler_load_conferma_salvataggio(el);
                        },
                        error:function(){
                            alert('errore');
                        }
                    }); 
                }
                else
                {
                    alert('Inserire un numero di telefono con prefisso nel formato +41, +39...');
                }
                
            }
            else
            {
                alert('Inserire un numero di telefono');
            }
            
        }
        else
        {
            alert('Accettare le condizioni per salvare');
        }
    }
    
    $('#file-upload-patente').change(function() {
        var input=this;
        console.info('input.files:');
        console.info(input.files);
        if (input.files && input.files[0]) {
            files_patente.push(input.files[0]);
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgpatentecontent=$('<img id="imgpatente" style="height: 100px;width: 100px;" src="'+e.target.result+'"/>');
                $('#imgpatentecontainer').append(imgpatentecontent);
                //$('#imgpatente').attr('src', e.target.result); //img element
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
    
    $('#file-upload-autoprima').change(function() {
        var input=this;
        console.info('input.files:');
        console.info(input.files);
        if (input.files && input.files[0]) {
            files_autoprima.push(input.files[0]);
            var reader = new FileReader();
            reader.onload = function (e) {
                //$('#imgautoprima').attr('src', e.target.result); //img element
                var imgautoprimacontent=$('<img id="imgpatente" style="height: 100px;width: 100px;" src="'+e.target.result+'"/>');
                $('#imgautoprimacontainer').append(imgautoprimacontent);
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
        <li class="active">
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
                    <input id="barcode" type="text" class="validate" minlength="5">
                    <label for="barcode">Barcode</label>
                </div>
          
              <div class="input-field col s6">
                    <div class='btn' onclick="winteler_get_dati_auto()">Cerca</div>
                </div>
          </div>
              <div class="row">
              <div class="input-field col s6">
                    <input id="telaio" type="text" class="validate" minlength="6" >
                    <label class="active" for="telaio" >Telaio</label>
              </div>
              <div class="input-field col s6">
                    <div class='btn' onclick="winteler_get_dati_auto()">Cerca</div>
                </div>
              </div>
              <div class="row">
            <div class="input-field col s12">
                    <input id="modello" type="text" class="validate" >
                    <label class="active" for="modello">Modello</label>
              </div>
              </div>
          <div class="row">
              <div class="input-field col s12">
                  <input id="targa" type="text" class="validate" >
                  <label  for="targa">Targa</label>
              </div>
          </div>
          <div class="row">
              <div class="input-field col s12">
                    <label>
                        <input id="precompilata" type="checkbox" value="true"/>
                        <span>Prova futura</span>
                    </label>
              </div>
          </div>
          </div>
      </div>
    </li>
    <li>
      <div class="collapsible-header">Dati cliente</div>
      <div class="collapsible-body">
          <div class="row">
                    <div class="input-field col s12">
                        <input id="cognome" type="text" class="validate">
                        <label  for="cognome">Cognome</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="nome" type="text" class="validate " >
                        <label  for="nome">Nome</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="email" type="text" class="validate">
                        <label  for="email">Email</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="via" type="text" class="validate">
                        <label  for="via">Via / N. Civico</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="cap" type="text" class="validate">
                        <label  for="cap">Cap</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="citta" type="text" class="validate">
                        <label  for="citta">Città</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="telefono" type="text" class="validate">
                        <label for="telefono">Telefono</label>
                    </div>
         
                    <div class="input-field col s12">
                                <div class="btn">
                                    <label for="file-upload-patente" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Foto patente
                                    </label>
                                    <input id="file-upload-patente" type="file" accept="image/*" capture multiple/>
                                </div>
                        <div id="imgpatentecontainer">
                            
                        </div>

                            </div>
          </div>
      </div>
    </li>
    <li>
      <div class="collapsible-header">Situazione partenza</div>
      
      <div class="collapsible-body">
          <div class="row">
          <div class="input-field col s12">
            <input id="kmpartenza" type="number" class="validate">
            <label  for="kmpartenza">Km partenza</label>
            </div>
            <div class="input-field col s12">
                <input id="datapartenza" type="text" class="validate datepicker">
                <label  for="datapartenza">Data partenza</label>
            </div>
            <div class="input-field col s12">
                <input id="orapartenza" type="text" class="validate timepicker">
                <label  for="orapartenza">Ora partenza</label>
            </div>
              <div class="input-field col s12">
                                    <div class="btn">
                                        <label for="file-upload-autoprima" class="custom-file-upload">
                                            <i class="fa fa-cloud-upload"></i> Foto auto Prima
                                        </label>
                                        <input id="file-upload-autoprima" type="file" accept="image/*" capture multiple/>
                                    </div>
                  <div id="imgautoprimacontainer">
                      
                  </div>

                                </div>
          </div>
      </div>
    </li>
    <li>
      <div class="collapsible-header">Condizioni di noleggio</div>
      
      <div class="collapsible-body" style="text-align: left">
          <b>Responsabilità</b><br/>
          Il cliente risponde anche delle ammende e delle contravvenzioni che
gli sono state elevate in relazione all’utilizzo del veicolo.<br/>
<br/>
<b>Durata della prova su strada</b><br/>
La prova del veicolo si estende secondo quanto pattuito con la
Winteler SA e dovrà essere precedentemente concordata. Il cliente
s’impegna a rispettare tale accordo.<br/>
<br/>
<b>Ritiro del veicolo</b><br/>
Il cliente è tenuto ad esaminare il veicolo al ritiro e ad indicare qui di
seguito eventuali danni o difetti riscontrati, in particolare i danni della
carrozzeria. Egli dichiara inoltre che al momento del ritiro il veicolo è
funzionante e in perfetto stato.<b>Il cliente attesta di essere in possesso
della necessaria licenza di condurre valida.</b><br/>
<br/>
<b>Circolazione con Targhe Professionali</b><br/>
La vettura munita di targa professionale è esonerata dal pagamento
della vignetta autostradale, ma solo nei giorni feriali. In caso di
infrazione il cliente è tenuto a pagare l’eventuale contravvenzione
elevata.
<br/>
<b>Incidente</b><br/>
In caso di incidente il cliente è tenuto ad informare immediatamente
la Winteler SA.<br/>
<br/>
<b>Responsabilità civile</b><br/>
Per ogni sinistro, i primi CHF 1’000.– vengono addebitati al cliente <b>a
    titolo di franchigia.</b><br/>
    <br/>
    <b>Casco</b><br/>
    <br/>
    In generale, il cliente risponde di ogni danno o perdita del veicolo fino
all’importo di CHF 1’000.– a prescindere dalla colpa. <b>In caso di colpa
    grave, il beneficiario risponde anche dei danni eccedenti tale importo.</b><br/>
    <br/>
    <b>Mercede me</b><br/>
    Il cliente è consapevole che i veicoli di proprietà della Winteler SA
sono muniti del sistema Mercedes me con sistema GPS (Global
Positioning System). L’elaborazione dei dati da parte della Winteler CO
SA avviene esclusivamente in casi straordinari (es. irreperibilità del
locatario, uscita dal territorio svizzero, mancato rientro o forte ritardo
dall’orario prestabilito, incidenti o malfunzionamenti del veicolo, …).
I dati raccolti dal sistema non sono conservati. Winteler SA si riserva
il diritto di non fornire il veicolo qualora il cliente non dovesse accettare
tali condizioni.<br/>
    <br/>
    <b>Diritto applicabile/foro competente</b><br/>
    Il presente contratto sottostà al diritto svizzero. Il foro competente è
Bellinzona.<br/>
<br/><br/>

    <label>
        <input id="condizioni" type="checkbox" />
        <span>Accetta condizioni</span>
      </label>
      </div>
    </li>
    
  </ul>
    <div class="input-field col s12">
                                <textarea id="note" class="materialize-textarea"></textarea>
                                <label  for="note">Note</label>
                            </div>
        
                            
                            
                            
                            
                            
                            
                            
                            
                             
                            
                            
                            <div class="input-field col s12" >
                                <a  style="width: 100%" class="waves-effect waves-light btn" onclick="salva_prove(this)">Salva</a>
                            </div>
                            <div class="row" >
                                <div class='btn' onclick="winteler_load_menu(this)">Menu</div>
                            </div>
                        </div>