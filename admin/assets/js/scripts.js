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

var caller1 = "";
var uid;
var data;

function checksession() {
    var xhr =  new XMLHttpRequest();
    this.responseType = 'text';
    xhr.onreadystatechange  =  function() {
        var ourData = xhr.response;
        if (this.readyState == 4 && this.status == 200) {//if result successful
            var statusText = xhr.responseText.split(":");;
            if(statusText[0] != "check"){//if session is not correct
                //styling the background of session alert
                document.getElementById("myDIV").style.background = "inherit"; 
                document.getElementById("myDIV").style.position="absolute";
                document.getElementById("myDIV").style.boxShadow = "inset 0 0 0 200px rgba(255,255,255,0.05)";
                document.getElementById("myDIV").style.filter= "blur(10px)";
                var data = xhr.responseText.split("`");
                alert("Session over, please login again");
                window.location.href=data[1];
            }
            else {//if session is correct
                //storing data into session variables
                sessionStorage.username = statusText[1];
                sessionStorage.password = statusText[2];
                sessionStorage.type = statusText[4];   
            }
        }
        
    };
    xhr.open("post", "assets/php/sessionvalidator.php", true);
    xhr.setRequestHeader("Content-type", "text/plain");
    xhr.send();

  }  

//to toggle hidden div's incase of adduser
  function addrow(caller){
    caller1 = caller;
    console.log("editcaller" + caller)
    document.getElementById('formedit').hidden = false;
    document.getElementById('tableform').hidden = true;
    //reseting the value of form
    if(caller =="adduser"){
        document.getElementById("formdata1").value = "Username"; 
        document.getElementById("formdata2").value = "Email"; 
        document.getElementById("formdata3").value = "Password"; 
        document.getElementById("input").innerHTML = "Previlage" +"<b class='caret'></b>";
    }
  }

  //to toggle hidden div's and fetch current data and pass to editor incase of edituser
  function editrow(caller, id){
    uid = id;
    caller1 = caller;
    document.getElementById('formedit').hidden = false;
    document.getElementById('tableform').hidden = true;

    //fetching data from table to e passed to edit form
    var username = document.getElementById(uid+"1").innerText;
    var email =  document.getElementById(uid+"2").innerText;
    var password =  document.getElementById(uid+"3").value;
    var type =  document.getElementById(uid+"4").innerText;
    //  console.log(type);
    if(caller =="edituser"){
        document.getElementById("formdata1").value = username; 
        document.getElementById("formdata2").value = email; 
        document.getElementById("formdata3").value = password; 
        document.getElementById("input").innerHTML = type +"<b class='caret'></b>";
    }
  }
  
//Replace  caret on form 
function replaceText(str){
    document.getElementById('input').innerHTML = str +"<b class='caret'></b>";
}


//Loading dynamic table(user) and load dynamic Type contents
function loadtable(){
    var xhr =  new XMLHttpRequest();
    this.responseType = 'text';
    xhr.onreadystatechange  =  function() {
        
        var ourData = xhr.response;
        if (this.readyState == 4 && this.status == 200) {//if result successful
            var ourData = xhr.responseText;
            data =xhr.responseText;
            update(ourData);
        }
        
    };

    xhr.open("GET", "assets/php/admintable.php", true);
    xhr.setRequestHeader("Content-type", "text/plain");
    xhr.send();

  }

  function update(ourData){
    ourData = ourData.split(':');
    document.getElementById("myTable").innerHTML = ourData[0];
    document.getElementById("dropdown").innerHTML = ourData[1];
}

function updateData(){
    var data1 = document.getElementById("formdata1").value;
    var data2 =  document.getElementById("formdata3").value;
    var data4 =  document.getElementById("formdata2").value;
    var data3 =  document.getElementById("input").innerText;
    var xhr =  new XMLHttpRequest();
    this.responseType = 'text';
    xhr.onreadystatechange  =  function() {
        var ourData = xhr.response;
        if (this.readyState == 4 && this.status == 200) {//if result successful
            console.log(xhr.responseText + "admin Hell1");
            //toggle hidden div's
            document.getElementById('formedit').hidden = true;
            document.getElementById('tableform').hidden = false;
            location.reload();   
        }
    };


    switch(caller1){
        case "adduser"://incase of new user
            xhr.open("POST", "assets/php/adduser.php", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            var params = 'username='+data1+'&password='+data2+'&type='+data3+'&email='+data4;
            xhr.send(params);
            break;
        case "edituser"://incase of editing existing user
            xhr.open("POST", "assets/php/updateuser.php", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            var params = 'username='+data1+'&password='+data2+'&type='+data3+"&uid="+uid+'&email='+data4;
            console.log(params);
            xhr.send(params);
            break;
        default:
            ;
    }
}

//delete user info with uid
function deleteUser(uid){
    var xhr =  new XMLHttpRequest();
    this.responseType = 'text';
    xhr.onreadystatechange  =  function() {
        var ourData = xhr.response;
        if (this.readyState == 4 && this.status == 200) {//if result successful
            console.log(xhr.responseText + "admin Hell1");
            document.getElementById('formedit').hidden = true;
            document.getElementById('tableform').hidden = false;
            location.reload(); 
            
        }
    };
    if(confirm("Are you sure? About deleting this row.")){
        xhr.open("POST", "assets/php/deleteuser.php", true);//php for deleting user with id
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        var params = 'uid='+uid;
        xhr.send(params);
    }
}
//incase cancel is presed in form div
function backB(){
    document.getElementById('formedit').hidden = true;
    document.getElementById('tableform').hidden = false;
}


