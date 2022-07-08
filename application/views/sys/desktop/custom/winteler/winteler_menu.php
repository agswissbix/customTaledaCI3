<?php
if($userid!=1077)
{
?>
<div class="row">
    <div class="btn" onclick="winteler_load_barcode(this)">Scheda auto</div>
</div>
<div class="row">
    <div class="btn" onclick="winteler_load_notespese(this)">Note spese</div>
</div>
<div class="row">
    <div class="btn" onclick="winteler_load_proveauto(this)">Prove auto</div>
</div>
<div class="row">
    <div class="btn" onclick="winteler_load_serviceman_menu(this)">Service Man</div>
</div>
<div class="row">
    <div class="btn" onclick="winteler_load_preventivocarrozzeria(this)">Preventivo carrozzeria</div>
</div>
<div class="row">
    <div class="btn" onclick="winteler_load_autonuove(this)">Auto nuove</div>
</div>
<?php
}
?>
<div class="row">
    <div class="btn" onclick="winteler_load_checklist(this)">Check list</div>
</div>
<?php
if($userid==1003)
{
?>
<div class="row">
    <div class="btn" onclick="winteler_load_statistiche(this)">Statistiche</div>
</div>
<?php
}
?>
<div class="row">
    <div onclick="winteler_logout(this)" class="waves-effect waves-light btn" style="width: 100%">Logout</div>
</div>
                    