Test1: <input id="myFileInput" type="file" accept="image/*;capture=camera">

Test2: <input type="file" accept="image/*" capture>

var myInput = document.getElementById('myFileInput');

function sendPic() {
    var file = myInput.files[0];
    console.info(file);
    // Send file here either by adding it to a `FormData` object 
    // and sending that via XHR, or by simply passing the file into 
    // the `send` method of an XHR instance.
}

myInput.addEventListener('change', sendPic, false);