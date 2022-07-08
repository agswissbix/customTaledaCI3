<?php

$get=$_GET;

?>

        
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body style="background-color: #white;">

      <!--JavaScript at end of body for optimized loading-->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <style>
        .collapsible-body{
            padding-top: 0px !important;
        }
        
        .btn{
            
            background-color: #e8eef1 !important;
            color: #16556F !important;
            border: 1px solid #16556F;
        }
        
        .modal{
            max-height: none;
            width: 90%;
            height: 90%;
        }
        
        .card{
            padding: 10px !important;
            text-align: center;
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
        <div class="container" style="background-color: #fdfdfd">
            <div class="row">
                <div class="col s12 m6 card">
                    <div class="card-image">
                        <img src="winteler_logo.jpg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <ul class="collapsible">
                            <li>
                              <div class="collapsible-header"><i class="material-icons">filter_drama</i>Dati</div>
                              <div class="collapsible-body">
                                  <div class="row">
                                       <table>
                                            <tbody>
                                                <tr>
                                                    <td>Barcode</td>
                                                    <td><?=$get['barcode']?></td>
                                                </tr>
                                                <tr>
                                                  <td>Modello</td>
                                                  <td>Classe A</td>
                                                </tr>
                                                <tr>
                                                  <td>Libro auto</td>
                                                  <td>112300</td>
                                                </tr>
                                                <tr>
                                                  <td>Numero WB</td>
                                                  <td>0957122524</td>
                                                </tr>
                                                <tr>
                                                  <td>Telaio</td>
                                                  <td>W1K1770841N190768X</td>
                                                </tr>
                                                <tr>
                                                  <td>Designazione</td>
                                                  <td>A 180 Compact Berlina Night Star</td>
                                                </tr>
                                                
                                            </tbody>
                                      </table>
                                  </div>
                              </div>
                            </li>
                            <li>
                              <div class="collapsible-header"><i class="material-icons">place</i>Foto</div>
                              <div class="collapsible-body">
                                    <div class="carousel">
                                        <a class="carousel-item" href="#one!"><img src="foto1.jpg"></a>
                                        <a class="carousel-item" href="#two!"><img src="foto2.jpg"></a>
                                        <a class="carousel-item" href="#three!"><img src="foto3.jpg"></a>
                                    </div>
                              </div>
                            </li>
                            <li>
                              <div class="collapsible-header"><i class="material-icons">whatshot</i>Documenti</div>
                              <div class="collapsible-body">
                                  <table>
                                        <tbody>
                                            <tr>
                                                <td><img src="pdf_icon.png" style="height: 20px"></img></td>
                                                <td>Fattura</td>
                                                <td>1161929</td>
                                            </tr>
                                            <tr>
                                                <td><img src="pdf_icon.png" style="height: 20px"></img></td>
                                              <td>WIP</td>
                                              <td>62379</td>
                                            </tr>
                                        </tbody>
                                    </table>
                              </div>
                            </li>
                        </ul>
                        <div class="input-field col s12" >
                            <a href="winteler_menu.php" style="width: 100%" class="waves-effect waves-light btn">Menu</a>
                        </div>
                      
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
    </body>
  </html>