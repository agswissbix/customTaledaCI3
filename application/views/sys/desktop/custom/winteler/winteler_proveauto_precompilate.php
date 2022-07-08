<div class="row">
    <div class="input-field col s12" >
        <div class='btn' onclick="winteler_load_proveauto_precompilate(this,'true')">Mostra tutti</div>
    </div>
</div>
<table>
        <thead>
          <tr>
              <th>Cliente</th>
              <th>Data</th>
              <th>Venditore</th>
          </tr>
        </thead>

        <tbody>
            <?php
            foreach ($proveauto as $key => $provaauto) {
            ?>
            <tr onclick="winteler_load_provaauto(this,'Precompilata','<?=$provaauto['FIDD']?>')">
                <td><?=$provaauto['F1073']?> <?=$provaauto['F1074']?></td>
                <td><?php
                    if(isnotempty($provaauto['F1138']))
                    {
                        echo date('Y/m/d',strtotime($provaauto['F1138']));
                    }
                ?></td>
                <td><?=$provaauto['venditore']?></td>
            </tr>
            <?php
            }
            ?>
            
    
         
        </tbody>
      </table>

<div class="row">
    <div class="input-field col s12" >
        <div class='btn' onclick="winteler_load_menu(this)">Menu</div>
    </div>
</div>