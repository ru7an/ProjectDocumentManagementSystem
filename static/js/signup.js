const new_sign = document.getElementById('signup');
const close_role = document.getElementById('close_role');
const close_sign = document.getElementById('close_sign');
const close_co = document.getElementById('close_co');
const signup_role_select = document.getElementById('role-bg');
const signup_form_s_s = document.getElementById('signup-bg');
const signup_form_co = document.getElementById('signup-co-bg');
const student = document.getElementById('student');
const supervisor = document.getElementById('supervisor');
const coordinator = document.getElementById('coordinator');
new_sign.onclick = function()
{
    signup_role_select.style.display = 'block';
}

close_role.onclick = function()
{
    signup_role_select.style.display = 'none';
}
close_sign.onclick = function()
{
    signup_form_s_s.style.display = 'none';
}
close_co.onclick = function()
{
    signup_form_co.style.display = 'none';
}
student.onclick = function()
{
    document.getElementById('registeras').innerText = 'Student';
    document.getElementById('role-s-s').value = 'Student';
    signup_form_s_s.style.display = 'block';   
    signup_role_select.style.display = 'none';
}
supervisor.onclick = function()
{
    document.getElementById('registeras').innerText = "Supervisor";
    document.getElementById('role-s-s').value = 'Supervisor';
    signup_form_s_s.style.display = 'block';   
    signup_role_select.style.display = 'none';
}
coordinator.onclick = function()
{
    signup_form_co.style.display = 'block';   
    signup_role_select.style.display = 'none';
}