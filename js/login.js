var txt="Welcome to R chat";
var i=0;
var speed=60;
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

//gender must be selected

//if any field is empty show empty error

sel("#signupbtn").addEventListener("click", function(e) {
    var i=0, j=0;
    var sis=document.querySelectorAll(".si");
    sis.forEach(function(elem){
        if (elem.style.borderColor=="red") {
            i++;
        }
    })
    document.querySelectorAll("input[name='gender']").forEach(function(elem){
        if (elem.checked==false) {
            j++;
        }
    })
    if (i>0 || j==2) {
        e.preventDefault();
        alert("Please, fill all the input fields correctly.");
    }
})
//error code
sel(".nameGiven").addEventListener("input", function(e) {
    var name=/^[a-zA-Z ]*$/.test(e.target.value);
    if (!name) {
        e.target.style.borderColor="red";
    }
    else {
        e.target.style.borderColor="#aaaaaa";
    }
})
sel(".emailGiven").addEventListener("input", function(e) {
    var email=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(e.target.value);
    if (!email) {
        e.target.style.borderColor="red";
    }
    else {
        e.target.style.borderColor="#aaaaaa";
    }
})
sel(".mobileGiven").addEventListener("input", function(e) {
    var mobile=/^[6789]\d{9}$/.test(e.target.value);
    if (!mobile) {
        e.target.style.borderColor="red";
    }
    else {
        e.target.style.borderColor="#aaaaaa";
    }
})
sel(".pass").addEventListener("input", function(e) {
    var typedPass=e.target.value;
    var pass=/(?=.{7,})/.test(e.target.value);
    if (!pass) {
        e.target.style.borderColor="red";
    }
    else {
        e.target.style.borderColor="#aaaaaa";
    }
    if (sel(".conf").value!=typedPass) {
        sel(".conf").style.borderColor="red";
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