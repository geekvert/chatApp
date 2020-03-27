var sel=function(str) {
    return document.querySelector(str);
}
document.querySelectorAll(".fa-pen").forEach(function(elem) {
    elem.addEventListener("click", function(e) {
        e.target.previousElementSibling.contentEditable="true";
        document.querySelector(".save").style.display="initial";
    })
})
var selectText=function(a) {
    return sel(".container").children[a].children[1].textContent;
}
document.querySelector(".save").addEventListener("click", function(e) {
    var username=selectText(1);
    var about=selectText(3);
    var age=selectText(4);
    var email=selectText(5);
    var mobile=selectText(6);
    var education=selectText(7);
    var address=selectText(8);
    
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            console.log(this.responseText);
            alert("Please complete your profile to access all featues.");
        }
    }
    xhttp.open("POST", "../php/changes.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username="+username+"&about="+about+"&age="+age+"&email="+email+"&mobile="+mobile+"&education="+education+"&address="+address);
    
    var picture=document.querySelector(".profilePic");
    var formData=new FormData();
    formData.append("images[]", picture.files[0]);

    var picObj=new XMLHttpRequest();
    picObj.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            console.log(this.responseText);
        }
    }
    picObj.open("POST", "../php/changes.php", true);
    picObj.send(formData);

    e.target.style.display="none";
})