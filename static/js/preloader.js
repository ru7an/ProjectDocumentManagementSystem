function preloader()
{
    setTimeout(function(){
        document.getElementById('preloader').style.display='none';
        document.getElementById('main').style.display='block';
    }, 1000);
}