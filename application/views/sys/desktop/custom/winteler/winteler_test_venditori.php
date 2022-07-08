
 
    <script type="text/javascript">
        var files=[];
       $(document).ready(function(){
            $('select').formSelect();
            $('.collapsible').collapsible();
            $('.datepicker').datepicker({
                format: 'yyyy.mm.dd'
            });
    
        });
    
   
        
        
    </script>

    
    
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
                    