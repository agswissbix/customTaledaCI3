<script src="vendor/jquery-1.9.0.min.js" type="text/javascript"></script>
<script src="../dist/quagga.js" type="text/javascript"></script>
<script type="text/javascript">
	Quagga.decodeSingle({
		decoder: {
			readers: ["code_128_reader"] // List of active readers
		},
		locate: true, // try to locate the barcode in the image
		src: 'test_quagga.jpg' // or 'data:image/jpg;base64,' + data
	}, function(result){
		if(result.codeResult) {
			alert(result.codeResult.code);
		} else {
			console.log("not detected");
		}
	});

</script>
