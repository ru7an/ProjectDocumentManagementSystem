const sidenav = document.getElementById('sidenav');
const dev_foot = document.getElementById('mname');
const ba1 = document.getElementById('ba1');
const ba2 = document.getElementById('ba2');
const ba3 = document.getElementById('ba3');
const ba4 = document.getElementById('ba4');
const ba5 = document.getElementById('ba5');

sidenav.onmouseenter = function()
{
    sidenav.style.width = "250px";
    sidenav.style.animation = "0.5s sid";
    setTimeout( function(){
        dev_foot.style.display = "block";
        ba1.style.display = "block";
        ba2.style.display = "block";
        ba3.style.display = "block";
        ba4.style.display = "block";
        ba5.style.display = "block";
    }, 50);
}
sidenav.onmouseleave = function()
{
    sidenav.style.width = "80px";
    sidenav.style.animation = "0.5s no_sid";
    dev_foot.style.display = "none";
    ba1.style.display = "none";
    ba2.style.display = "none";
    ba3.style.display = "none";
    ba4.style.display = "none";
    ba5.style.display = "none";
}