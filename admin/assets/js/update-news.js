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