<script type="text/javascript">
    
    
    
    
    
    
    
    
</script>

<div class="row">
    Statistiche
    <div class="row" >
        <div class='btn' onclick="winteler_load_menu(this)">Menu</div>
        <?php
        $labels="";
        $data="";
        foreach ($rows as $key => $row) {
            $user=$row['user'];
            $username=$user['FSGL'];
            $counter=$row['counter'];
            
            if($labels!='')
            {
                $labels=$labels.",";
            }
            $labels=$labels."'$username'";
            
            if($data!='')
            {
                $data=$data.",";
            }
            $data=$data."$counter";
            
            
        ?>
        <br/><br/>
        <div style="text-align: left;">
            <?=$username?>:<?=$counter?>
        </div>
        <?php
        }
        ?>
        <br/><br/>
        <canvas id="myChart" width="400" height="400"></canvas>
        <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?=$labels?>],
                datasets: [{
                    label: '',
                    data: [<?=$data?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
        
        
    </div>
</div>