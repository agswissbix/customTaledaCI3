<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>index</title>
    <meta name="description" content=""/>
    <meta name="author" content="Christoph Oberhofer"/>

    <meta name="viewport" content="width=device-width; initial-scale=1.0"/>
</head>

<body>

<section id="container" class="container">


    <div class="controls">
        <button onclick="$('#barcode').html('Barcode test');">TEST</button>
        <fieldset class="input-group">
            <input type="file" accept="image/*" capture="camera"/>
            <button>Rerun</button>
        </fieldset>
        <fieldset class="reader-config-group" style="display: none;">
            <label>
                <span>Barcode-Type</span>
                <select name="decoder_readers">
                    <option value="code_128" selected="selected">Code 128</option>
                    <option value="code_39">Code 39</option>
                    <option value="code_39_vin">Code 39 VIN</option>
                    <option value="ean">EAN</option>
                    <option value="ean_extended">EAN-extended</option>
                    <option value="ean_8">EAN-8</option>
                    <option value="upc">UPC</option>
                    <option value="upc_e">UPC-E</option>
                    <option value="codabar">Codabar</option>
                    <option value="i2of5">Interleaved 2 of 5</option>
                    <option value="2of5">Standard 2 of 5</option>
                    <option value="code_93">Code 93</option>
                </select>
            </label>
            <label>
                <span>Resolution (long side)</span>
                <select name="input-stream_size">
                    <option value="320">320px</option>
                    <option value="640">640px</option>
                    <option selected="selected" value="800">800px</option>
                    <option value="1280">1280px</option>
                    <option value="1600">1600px</option>
                    <option value="1920">1920px</option>
                </select>
            </label>
            <label>
                <span>Patch-Size</span>
                <select id="locator_patch-size" name="locator_patch-size">
                    <option value="x-small">x-small</option>
                    <option value="small">small</option>
                    <option value="medium">medium</option>
                    <option selected="selected" value="large">large</option>
                    <option value="x-large">x-large</option>
                </select>
            </label>
            <label>
                <span>Half-Sample</span>
                <input type="checkbox" name="locator_half-sample" />
            </label>
            <label>
                <span>Single Channel</span>
                <input type="checkbox" name="input-stream_single-channel" />
            </label>
            <label>
                <span>Workers</span>
                <select name="numOfWorkers">
                    <option value="0">0</option>
                    <option selected="selected" value="1">1</option>
                </select>
            </label>
        </fieldset>
    </div>
    <div id="result_strip" style="display: none;">
        <ul class="thumbnails"></ul>
    </div>
    <div id="interactive" class="viewport" style=""></div>
    <div id="debug" class="detection"></div>
    <div id="imgpreview"></div>
    <div id="barcode">Barcode:</div>
    
</section>
<footer>
    <p>
        &copy; Copyright by Christoph Oberhofer
    </p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="http://localhost:8022/adiwinteler/assets/js/canvasResize/jquery.canvasResize.js?v=<?=time();?>"></script>
<script src="http://localhost:8022/adiwinteler/assets/js/custom/winteler/quagga.js"></script>

<script src="http://localhost:8022/adiwinteler/assets/js/canvasResize/zepto.min.js?v=<?=time();?>"></script>
<script src="http://localhost:8022/adiwinteler/assets/js/canvasResize/binaryajax.js?v=<?=time();?>"></script>
<script src="http://localhost:8022/adiwinteler/assets/js/canvasResize/exif.js?v=<?=time();?>"></script>
<script src="http://localhost:8022/adiwinteler/assets/js/canvasResize/canvasResize.js?v=<?=time();?>"></script>

<script src="http://localhost:8022/adiwinteler/assets/js/custom/winteler/file_input.js?v=<?=time();?>"></script>

</body>
</html>
