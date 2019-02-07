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

function hideShow() {
        var x = document.getElementById("addNews");
          if (x.style.display == "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
        var y = document.getElementById("news");
            if (y.style.display == "inline") {
            y.style.display = "none";
          } else {
            y.style.display = "inline";
          }
        var z = document.getElementById("editNews");
            if (z.style.visibility == "visible") {
            z.style.visibility = "hidden";
          } else {
            z.style.visibility = "visible";
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
    if(confirm("Delete Records?")){
        xhr.open("POST", "delete-news.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(params);
    }
}

function fetch_news() {
    var xhr =  new XMLHttpRequest();
    this.responseType = 'text';
    xhr.onreadystatechange  =  function() {
        if (this.readyState == 4 && this.status == 200) {//if result successful
                document.getElementById("fetch").innerHTML = "<table class='table table-hover table-striped' id='editNews' style='visibility:visible'>" + xhr.responseText + "</table>";
        }
    };
        xhr.open("GET", "fetch-news.php", true);
        xhr.setRequestHeader("Content-type", "text/plain");
        xhr.send();
}


function read_news(id){
	var xhr =  new XMLHttpRequest();
	var params = 'id='+id;
    this.responseType = 'text';
    xhr.onreadystatechange  =  function() {
        if (this.readyState == 4 && this.status == 200) {//if result successful
            var data = xhr.responseText.split(":");
            document.getElementById("fetch").innerHTML ="<div><pre><label>HEADLINE</label><pre>"+data[0]+"</pre><br><label>SUB-HEADLINE</label><pre>"+data[1]+"</pre><br><label>NEWS</label><pre>"+data[2]+"</pre></pre></div><button class='btn btn-secondary-outline' value='Back' onclick = 'load_page();'>RETURN</button>";
            }
    };
    xhr.open("POST", "read-news.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(params);
}
function load_page(){
    window.location = 'http://understandable-blin.hostingerapp.com/zzDIC/admin/news-feed.html';
}
function show_image(id){
	var xhr =  new XMLHttpRequest();
	var params = 'id='+id;
    this.responseType = 'text';
    xhr.onreadystatechange  =  function() {
        if (this.readyState == 4 && this.status == 200) {//if result successful
            if(xhr.responseText.startsWith("<pre")){
                document.getElementById("fetch").innerHTML ="<div><pre>"+xhr.responseText + "</pre></div><table><tr><button class='btn btn-secondary-outline' value='Back' onclick = 'load_page();'>RETURN</button></tr></table>";
            }else{
                alert('Image not found!');
            }
        }
    };
    xhr.open("POST", "show-image.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(params);
}
function edit_news(id){
    hideShow();
    var xhr =  new XMLHttpRequest();
    var params = 'id='+id;
    this.responseType = 'text';
    xhr.onreadystatechange  =  function() {
        if (this.readyState == 4 && this.status == 200) {//if result successful
                var data = xhr.responseText.split(":");
                document.getElementById("Headline").value = data[0];
                document.getElementById("Subheadline").value = data[1];
                document.getElementById("News").value = data[2];
                document.getElementById("editId").value = data[3];
        }
    };
    xhr.open("POST", "read-news.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(params);
}
