
  var caller = "";

function showData(str, caller1) {
    var xhr =  new XMLHttpRequest();
    caller = caller1;
    this.responseType = 'text';
    xhr.onreadystatechange  =  function() {
        
        var ourData = xhr.response;
        if (this.readyState == 4 && this.status == 200) {//if result successful
            var ourData = xhr.responseText.split(":");
            update(ourData, str);
        }
        
    };

    switch (caller){
        case "infrastructure":
            xhr.open("GET", "getinfra.php", true);
            break;
        case "industry":
            xhr.open("GET", "getindustry.php", true);//other php files here
            break;
        case "vya":
        xhr.open("GET", "getmagazine.php", true);
            break;
        default:
            ;
    }
    xhr.setRequestHeader("Content-type", "text/plain");
    xhr.send();

  }

  function update(ourData, str){
    var newstr = str.split(":");
    switch (caller){
        case "infrastructure":
            document.getElementById(newstr[0]).innerHTML = ourData[0];
            document.getElementById(newstr[1]).innerHTML = ourData[1];
            document.getElementById(newstr[2]).innerHTML = ourData[2];
            document.getElementById(newstr[3]).innerHTML = ourData[3];
            break;
        case "industry":
            document.getElementById(newstr[0]).innerHTML = ourData[0];
            break;
        case "vya":
            console.log(newstr[0]+" hell "+ ourData[0]);
            document.getElementById(newstr[0]).innerHTML = ourData[0];
            break;

            default:
            ;
    }
    
    // document.getElementById(newstr[i]).innerHTML =  ourData[2].toUpperCase()+" ";
    // document.getElementById(newstr[i]).innerHTML =  ourData[3];

    
  };

  function includeHTML() {
    var z, i, elmnt, file, xhttp;
    /* Loop through a collection of all HTML elements: */
    z = document.getElementsByTagName("*");
    for (i = 0; i < z.length; i++) {
      elmnt = z[i];
      /*search for elements with a certain atrribute:*/
      file = elmnt.getAttribute("w3-include-html");
      if (file) {
        /* Make an HTTP request using the attribute value as the file name: */
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4) {
            if (this.status == 200) {
                elmnt.innerHTML = this.responseText;
            }
            if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
            /* Remove the attribute, and call this function once more: */
            elmnt.removeAttribute("w3-include-html");
            includeHTML();
          }
        } 
        xhttp.open("GET", file, true);
        xhttp.send();

        /* Exit the function: */
        return;
      }
    }
    // window.onload = newFunction();
    
    

    //   function newFunction() {

    //   }
    // console.log("Hell onload");
    // document.getElementById("#myHeader").style.background = "#fff";
} 