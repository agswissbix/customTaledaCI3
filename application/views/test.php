<script type="text/javascript" src="<?php echo base_url('/assets/iro.js-master/dist/iro.js') ?>"></script>
<script type="text/javascript">
    var colorWheel = new iro.ColorPicker("#colorWheelDemo", {
    // options here
});

var myColor = colorWheel.color.hexString;
alert(myColor);
</script>
<div class="wheel" id="colorWheelDemo"></div>
