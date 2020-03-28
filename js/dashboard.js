var sel=function(str) {
    return document.querySelector("str");
}
document.querySelectorAll(".user").forEach(function(elem) {
    elem.addEventListener("click", function(e) {
        e.target.nextSibling.nextSibling.classList.toggle("block");
    })
})
