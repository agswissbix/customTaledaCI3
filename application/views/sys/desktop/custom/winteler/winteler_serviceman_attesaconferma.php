<table>
        <thead>
          <tr>
              <th>Cliente</th>
              <th>Data</th>
          </tr>
        </thead>

        <tbody>
            <?php
            foreach ($servicemans as $key => $serviceman) {

                
            ?>
            <tr >
                <td><?=$serviceman['F1073']?> <?=$serviceman['F1074']?></td>
                <td><?php
                    if(isnotempty($serviceman['F1004']))
                    {
                        echo date('Y/m/d',strtotime($serviceman['F1004']));
                    }
                ?></td>
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