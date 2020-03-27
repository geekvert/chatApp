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
sel(".profilePic").addEventListener("click", function(e) {
    sel(".save").style.display="initial";
})
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
            var res1=this.responseText;
            if (res1.includes("dashboard")) {
                window.location.href="../php/dashboard.php";
            }
            else if (res1.includes("empty error")) {
                alert("Please complete your profile to access all features of the application!");
            }
        }
    }
    xhttp.open("POST", "../php/changeInfo.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username="+username+"&about="+about+"&age="+age+"&email="+email+"&mobile="+mobile+"&education="+education+"&address="+address);
    
    var picture=document.querySelector(".profilePic");
    var formData=new FormData();
    formData.append("images[]", picture.files[0]);

    var picObj=new XMLHttpRequest();
    picObj.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            var res2=this.responseText;
            if (res2.includes("dashboard")) {
                window.location.href="../php/dashboard.php";
            }
            else if (res2.includes("empty error")) {
                alert("Please complete your profile to access all features of the application!");
            }
            else if (res2.includes("only images are allowed")) {
                alert("Only images are allowed!");
            }
        }
    }
    picObj.open("POST", "../php/changePic.php", true);
    //picObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    picObj.send(formData);

    e.target.style.display="none";
})