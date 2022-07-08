<style type="text/css">
    #collapsible-documentoprincipale{
        padding: 0px !important;
    }
</style>
    <script type="text/javascript">
$(document).ready(function(){
    $('.collapsible').collapsible();
    var instance = M.Collapsible.getInstance($('.collapsible'));
    instance.open(1);
    $('.carousel').carousel();
    instance.open(0);
    

    
  });
       
        
        
    </script>

                    <?php
                    if($autotrovata)
                    {
                    ?>
                        <ul class="collapsible">
                            <li>
                              <div class="collapsible-header"><i class="material-icons">filter_drama</i>Dati</div>
                              <div class="collapsible-body">
                                  <div class="row">
                                       <table>
                                            <tbody>
                                                <tr>
                                                    <td>Barcode</td>
                                                    <td><?=$barcode?></td>
                                                </tr>
                                                <tr>
                                                  <td>Modello</td>
                                                  <td><?=$modello?></td>
                                                </tr>
                                                <tr>
                                                  <td>Libro auto</td>
                                                  <td><?=$libroauto?></td>
                                                </tr>
                                                <tr>
                                                  <td>Numero WB</td>
                                                  <td><?=$numerowb?></td>
                                                </tr>
                                                <tr>
                                                  <td>Telaio</td>
                                                  <td><?=$telaio?></td>
                                                </tr>
                                                <tr>
                                                  <td>Designazione</td>
                                                  <td><?=$designazione?></td>
                                                </tr>
                                                
                                            </tbody>
                                      </table>
                                  </div>
                              </div>
                            </li>
                            
                            
                            <li>
                                <div class="collapsible-header"><i class="material-icons">whatshot</i>Documento principale</div>
                                <div id="collapsible-documentoprincipale" class="collapsible-body" style="padding: 0px !important">
                                    <iframe src="<?=$document?>" height="300" width="100%"></iframe>
                                    <a class="waves-effect waves-light btn" style="width: 50%;margin: auto;" href="<?=$document?>" target="_blank">Scarica</a>
                                </div>
                                
                            </li>
                            <li>
                              <div class="collapsible-header"><i class="material-icons">whatshot</i>Allegati</div>
                              <div class="collapsible-body">
                                  <table>
                                        <tbody>
                                            <?php
                                                foreach ($attachments as $key => $attachment) {
                                            ?>
                                                <td><a href="<?=$attachment['url']?>" target="_blank"><?=$attachment['name']?></a></td>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                              </div>
                            </li>
                            <li>
                              <div class="collapsible-header"><i class="material-icons">whatshot</i>Collegati</div>
                              <div class="collapsible-body">
                                    <table>
                                        <tbody>
                                            <?php
                                                foreach ($linked_rows as $key => $linked_row) {
                                            ?>
                                                <td><a href="<?=$linked_row['url']?>" target="_blank"><?=$linked_row['name']?></a></td>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                              </div>
                            </li>
                        </ul>
                        <div class="input-field col s12" >
                            <div class='btn' onclick="winteler_load_menu(this)">Menu</div>
                        </div>
                      
                    <?php
                    }
                    else
                    {
                    ?>
                    Auto con Barcode <?=$barcode_auto?> non trovata nel sistema
                    <div class="input-field col s12" >
                        <div class='btn' onclick="winteler_load_menu(this)">Menu</div>
                    </div>
                    <?php
                    }
                    ?>
                    
       