
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

            default:
            ;
    }
    
    // document.getElementById(newstr[i]).innerHTML =  ourData[2].toUpperCase()+" ";
    // document.getElementById(newstr[i]).innerHTML =  ourData[3];

    
  };
