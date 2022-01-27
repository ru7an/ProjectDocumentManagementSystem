function preloader()
{
    setTimeout(function(){
        document.getElementById('preloader').style.display='none';
        document.getElementById('main').style.display='block';
    }, 1000);
}
function preloader_home()
{
    document.getElementById('preloader').style.display='none';
    document.getElementById('main').style.display='block';
}