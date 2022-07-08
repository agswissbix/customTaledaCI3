        
    <script type="text/javascript">

    
       function winteler_login()
       {


                    var fd = new FormData();
                    fd.append('utente',$('#utente').val());
                    fd.append('password',$('#password').val());
                    
                    $.ajax({
                        url: '<?= controller_url()."winteler_login" ?>',
                        method: 'POST',
                        data: fd,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(response){
                          
                          $('.card-content').html(response);
                        },
                        error:function(){
                            alert('errore');
                        }
                    });

       }
       
       //your script here.
       
        
        
    </script>
  
                      <div class="row">
                      <div class="input-field col s12">
                          <input placeholder="Utente" id="utente" type="text" class="validate">
                          <label for="utente">Utente</label>
                      </div>
                      </div>
                      
                      <div class="row">
                          <div class="input-field col s12">
                              <input placeholder="Password" id="password" type="password" class="validate">
                              <label for="password">Password</label>
                          </div>
                      </div>
                    <div class='row'>
                         <a class="waves-effect waves-light btn" onclick="winteler_login()">Login</a>
                    </div>
                      </div>

                     
