var txt="Welcome to R chat";
var i=0;
var speed=70;
function type1() {
    if (i<txt.length) {
        document.querySelector(".welcome").textContent+=txt.charAt(i);
        i++;
        setTimeout(type1, speed);
    }
    else {
        type2();
    }
}
var txt2="helps connecting people :)";
var j=0;
function type2() {
    if (j<txt2.length) {
        document.querySelector(".helps").textContent+=txt2.charAt(j);
        j++;
        setTimeout(type2, speed);
    }
}
type1();

var sel=function(str) {
    return document.querySelector(str);
}
sel(".signupEvent").addEventListener("click", function(e) {
    sel(".signup").style.display="flex";
    sel(".login").style.display="none";
})
sel(".loginEvent").addEventListener("click", function(e) {
    sel(".signup").style.display="none";
    sel(".login").style.display="flex";
})

//CAUTION! validation code ahead
var signupSubmit=function() {
    //append that red warning!

}
var error="<span>*username already taken</span>";

sel(".emailGiven").addEventListener("input", function(e) {
    error="<span style=\"color:red\">*enter correct e-mail address</span>";
    var email=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(sel(".emailGiven").value);    
    if (!email) {
//        sel(".email>label").innerHtml+=error;

        e.target.style.borderColor="red";
    }
    else {
        e.target.style.borderColor="#aaaaaa";
    }
})
sel(".mobileGiven").addEventListener("input", function(e) {
    var mobile=/^[6789]\d{9}$/.test(sel(".mobileGiven").value);
    if (!mobile) {
        e.target.style.borderColor="red";
    }
    else {
        e.target.style.borderColor="#aaaaaa";
    }
})
sel(".pass").addEventListener("input", function(e) {
    var pass=/(?=.{7,})/.test(e.target.value);
    if (!pass) {
        e.target.style.borderColor="red";
    }
    else {
        e.target.style.borderColor="#aaaaaa";
    }
})
sel(".conf").addEventListener("input", function(e) {
    var match=sel(".pass").value;
    if (e.target.value!=match) {
        e.target.style.borderColor="red";
    }
    else {
        e.target.style.borderColor="#aaaaaa";
    }
})