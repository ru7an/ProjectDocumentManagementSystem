document.getElementById('scu').onclick = function()
{
    document.getElementById('present_users').style.display="block";
    document.getElementById('new_commers').style.display="none";
}
document.getElementById('snr').onclick = function()
{
    document.getElementById('present_users').style.display="none";
    document.getElementById('new_commers').style.display="block";
}