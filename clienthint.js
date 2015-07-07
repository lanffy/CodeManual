var xmlHttp = null;
function showHint(str) {
    if(str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    xmlHttp = GetXmlHttpObject();
    if(xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "gethint.php";
    url = url + "?q=" + str;
    url = url + "&sid=" + Math.random();
   
    xmlHttp.open("GET", url, true);
    xmlHttp.onreadystatechange = stateChanged();
    xmlHttp.send(null);
}

function stateChanged() {
    if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        document.getElementById("txtHint").innerHTML = xmlHttp.responseText;
    }
}

function GetXmlHttpObject() {
    var xmlHttp = null;
    try{
        //Firefox Opera8.0+ Safari
        xmlHttp = new XMLHttpRequest();
    }catch(e) {
        //IE
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}