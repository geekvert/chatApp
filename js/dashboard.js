document.querySelectorAll(".user").forEach(function(elem) {
    elem.addEventListener("click", function(e) {
        e.target.nextSibling.nextSibling.classList.toggle("block");
    })
})
document.querySelector(".logoutbtn").addEventListener("click", function(e) {
    window.location.href="../php/logout.php";
})
document.querySelector(".pro").addEventListener("click", function(e) {
    window.location.href="../php/profile.php";
})