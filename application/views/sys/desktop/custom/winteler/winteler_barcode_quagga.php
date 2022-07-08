<script type="text/javascript">
	Quagga.decodeSingle({
		decoder: {
			readers: ["code_128_reader"] // List of active readers
		},
		locate: true, // try to locate the barcode in the image
		src: '<?=domain_url()?>AdiServer/barcode/<?=$filename?>' // or 'data:image/jpg;base64,' + data
	}, function(result){
		if(result.codeResult) {
                    console.log("result 1", result.codeResult.code);
                    $('#quagga_result').html(result.codeResult.code);
                    $('#barcode').focus();
                    $('#barcode').val(result.codeResult.code);
			
		} else {
                    console.log("not detected");
                    $('#quagga_result').html(result.codeResult.code);
			
		}
	});

</script>
<div id="quagga_result">

</div>
