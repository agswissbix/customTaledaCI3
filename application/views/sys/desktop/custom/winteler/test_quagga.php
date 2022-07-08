<script type="text/javascript">
	Quagga.decodeSingle({
		decoder: {
			readers: ["code_128_reader"] // List of active readers
		},
		locate: true, // try to locate the barcode in the image
		src: '<?=base_url("/assets/images/custom/Winteler/test_quagga.jpg")?>' // or 'data:image/jpg;base64,' + data
	}, function(result){
		if(result.codeResult) {
                    $('html').html(result.codeResult.code);
			console.log("result 1", result.codeResult.code);
		} else {
                     $('html').html(result.codeResult.code);
			console.log("not detected");
		}
	});

</script>
