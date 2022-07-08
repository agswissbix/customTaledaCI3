<script type="text/javascript">
    // create new detector
var barcodeDetector = new BarcodeDetector({formats: ['code_39', 'codabar', 'ean_13']});

// check compatibility
if (barcodeDetector) {
  console.log('Barcode Detector supported!');
  const image = new Image;
    image.src = "test_quagga.jpg";
  console.info(barcodeDetector.detect(image))

} else {
  console.log('Barcode Detector is not supported by this browser.');
}


</script>

<img id='test_quagga' src="test_quagga.jpg">