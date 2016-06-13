var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
    var xmlHttp;

    if(window.ActiveXObject){
        try{
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
            xmlHttp = false;
        }
    }else{
        try{
            xmlHttp = new XMLHttpRequest();
        }catch(e){
            xmlHttp = false;
        }
    }

    if(!xmlHttp)
        alert("Cant create that object !");
    else
        return xmlHttp;
}

function process(){
    if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
        id = encodeURIComponent(document.getElementById("id").value);
        pw = encodeURIComponent(document.getElementById("pw").value);
        pw_confirm = encodeURIComponent(document.getElementById("pw_confirm").value);
        xmlHttp.open("GET", "test.php?id="+id,true);

        if(pw=='')
            document.getElementById("underpassInput").innerHTML = '';
        else if(pw.length<6)
            document.getElementById("underpassInput").innerHTML = '영문, 숫자가 6자이상 혼합되어야 사용할 수 있습니다.';
        else if(pw == pw_confirm)
            document.getElementById("underpassInput").innerHTML = '비밀번호 일치';
        else
            document.getElementById("underpassInput").innerHTML = '비밀번호 불일치';


        xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.send(null);
    }else{
        setTimeout('process()',1000);
    }
}

function handleServerResponse(){
    if(xmlHttp.readyState==4){
        if(xmlHttp.status==200){
            xmlResponse = xmlHttp.responseXML;
            xmlDocumentElement = xmlResponse.documentElement;
            message = xmlDocumentElement.firstChild.data;
            if(id.indexOf('.')>-1 && id.indexOf(' ')<0 && id.indexOf('@')<0)
                document.getElementById("underInput").innerHTML = message;
            else
                document.getElementById("underInput").innerHTML = '이메일을 입력해주세요.';
            setTimeout('process()', 1000);
        }else{
            alert('Someting went wrong !');
        }
    }
}