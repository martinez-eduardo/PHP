#Javascript Send Asyncronico:


```js
var formData;
formData = new FormData(document.getElementById("formula") );
var request = new XMLHttpRequest();
request.open('POST', "../Funciones/guardardata.php", true);
request.onload = function() { alert(request.responseText ); };
request.send(formData);
```
