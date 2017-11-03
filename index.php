<!DOCTYPE html>
<html>
<body>

<p>Click the button to trigger a function that will output "Hello World" in a p element with id="demo".</p>

<button onclick="getOrgs()">Click me</button>

<p id="demo"></p>

<script>
function myFunction() {
    document.getElementById("demo").innerHTML = "Hello World";
}
function getOrgs() { 

    var req = new XMLHttpRequest(); 
    debugger; 
    req.open("GET", "https://disco.crm.dynamics.com/api/discovery/v8.0/Instances"); 
    req.withCredentials= true;
    //req.setRequestHeader("Accept", "application/json"); 
    //req.setRequestHeader("Content-Type", "application/json; charset=utf-8"); 
    //req.setRequestHeader("OData-MaxVersion", "4.0"); 
   // req.setRequestHeader("OData-Version", "4.0"); 
    req.onreadystatechange = function () { 
        if (this.readyState == 4 /* complete */) { 
            req.onreadystatechange = null; 
            if (this.status == 200) { 
                var discovery = JSON.parse(this.response); 
                alert("User Id : " + discovery.Url); 
            } 
            else { 
                var error = JSON.parse(this.response).error; 
                alert(error.message); 
            } 
        } 
    }; 
    req.send(); 
}
</script>

</body>
</html>
