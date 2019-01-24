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