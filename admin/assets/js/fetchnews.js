
  var caller = "";

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