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
            if (this.status == 200) {elmnt.innerHTML = this.responseText;}
            if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
            /* Remove the attribute, and call this function once more: */
            elmnt.removeAttribute("w3-include-html");
            includeHTML();
          }
        }; 
        xhttp.open("GET", file, true);
        xhttp.send();
        /* Exit the function: */
        return;
      }
    }
}

function delete_news(id){
	var xhr =  new XMLHttpRequest();
	var params = 'id='+id;
    this.responseType = 'text';
    xhr.onreadystatechange  =  function() {
        if (this.readyState == 4 && this.status == 200) {//if result successful
                document.getElementById("fetch").innerHTML = "<table class='table table-hover table-striped'><tbody>" + xhr.responseText + "</tbody></table>";
        }
    };
    xhr.open("POST", "delete-news.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(params);
}

function delete_news(id){
  var xhr =  new XMLHttpRequest();
  var params = 'id='+id;
    this.responseType = 'text';
    xhr.onreadystatechange  =  function() {
        if (this.readyState == 4 && this.status == 200) {//if result successful
                document.getElementById("fetch").innerHTML = "<table class='table table-hover table-striped'><thead><th>ID</th><th>DATE</th><th>HEADLINE</th><th>SUBHEADLINE</th><th>CONTENT</th><th>ACTIONS</th></thead><tbody>" + xhr.responseText + "</tbody></table>";
        }
    };
    xhr.open("POST", "edit-news.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(params);
}

function fetch_news() {
    var xhr =  new XMLHttpRequest();
    this.responseType = 'text';
    xhr.onreadystatechange  =  function() {
        if (this.readyState == 4 && this.status == 200) {//if result successful
                document.getElementById("fetch").innerHTML = "<table class='table table-hover table-striped'>" + xhr.responseText + "</table>";
        }
    };
    xhr.open("GET", "fetch-news.php", true);
    xhr.setRequestHeader("Content-type", "text/plain");
    xhr.send();
}
function update_news(){

    var data1 = document.getElementById("Headline").value;
    var data2 = document.getElementById("Subheadline").value;
    var data3 = document.getElementById("News").value;
    var xhr =  new XMLHttpRequest();
    this.responseType = 'valom nadakuo?';
    xhr.onreadystatechange  =  function() {
        if (this.readyState == 4 && this.status == 200) {//if result successful
                //console.log(xhr.responseText);
                //document.getElementById("upnews").value;
        }
    };
    if(confirm("Press 'OK' to confirm")){
        xhr.open("POST", "update-news.php", true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        var params = 'Headline='+data1+'&Subheadline='+data2+'&News='+data3;
        xhr.send(params);
        location.reload();
    }   
}