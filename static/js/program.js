const prog = document.getElementById('my-program')
const men_prog = document.getElementById('menu-icon');
window.onclick = function(event)
{
    if(event.target==men_prog)
    {
        prog.style.display="block";
        men_prog.style.backgroundColor="rgba(255, 255, 255, 0.288)";
    }
    else
    {
        prog.style.display="none";
        men_prog.style.backgroundColor="transparent";
    }
}

//Make the DIV element draggagle:
dragElement(document.getElementById("profilediv"));
dragElement(document.getElementById("chatdiv"));
dragElement(document.getElementById("noticediv"));
dragElement(document.getElementById("notificationdiv"));
dragElement(document.getElementById("uctrldiv"));
dragElement(document.getElementById("projectdiv"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.pr//Make the DIV element draggagle:
    dragElement(document.getElementById("profilediv"));
    dragElement(document.getElementById("chatdiv"));
    dragElement(document.getElementById("noticediv"));
    dragElement(document.getElementById("notificationdiv"));
    dragElement(document.getElementById("uctrldiv"));
    dragElement(document.getElementById("projectdiv"));
    
    function dragElement(elmnt) {
      var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
      if (document.getElementById(elmnt.id + "header")) {
        /* if present, the header is where you move the DIV from:*/
        document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
      } else {
        /* otherwise, move the DIV from anywhere inside the DIV:*/
        elmnt.onmousedown = dragMouseDown;
      }
    
      function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        // get the mouse cursor position at startup:
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        // call a function whenever the cursor moves:
        document.onmousemove = elementDrag;
      }
    
      function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();
        // calculate the new cursor position:
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        // set the element's new position:
        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
      }
    
      function closeDragElement() {
        /* stop moving when mouse button is released:*/
        document.onmouseup = null;
        document.onmousemove = null;
      }
    }
    eventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}

// close button
document.getElementById('close-pd').onclick = function()
{
    document.getElementById("profile-window").style.display="none";
    document.getElementById('profilediv').style.display='none';
    document.getElementById('profile-active').style.boxShadow="none";
}

document.getElementById('close-cd').onclick = function()
{
    document.getElementById('chatdiv').style.display='none';
    document.getElementById('chat-active').style.boxShadow="none";
}

document.getElementById('close-nod').onclick = function()
{
    document.getElementById('notificationdiv').style.display='none';
    document.getElementById('notify-active').style.boxShadow="none";
}

document.getElementById('close-nd').onclick = function()
{
    document.getElementById('noticediv').style.display='none';
    document.getElementById('notice-active').style.boxShadow="none";
}

document.getElementById('close-ud').onclick = function()
{
    document.getElementById('uctrldiv').style.display='none';
    document.getElementById('uctrl-active').style.boxShadow="none";
}

document.getElementById('close-prd').onclick = function()
{
    document.getElementById("project-window").style.display="none";
    document.getElementById('projectdiv').style.display='none';
    document.getElementById('project-active').style.boxShadow="none";
}

// window open function

function open_profile()
{
    reset_zindex();
    document.getElementById("profile-window").style.display="block";
    document.getElementById("profilediv").style.zIndex="9";
    document.getElementById('profilediv').style.display="block";
    document.getElementById('profile-active').style.boxShadow="inset 0 0 4px 4px grey";
}
function open_chat()
{
    reset_zindex();
    document.getElementById("chatdiv").style.zIndex="9";
    document.getElementById('chatdiv').style.display="block";
    document.getElementById('chat-active').style.boxShadow="inset 0 0 4px 4px grey";
}
function open_uctrl()
{
    reset_zindex();
    document.getElementById("uctrldiv").style.zIndex="9";
    document.getElementById('uctrldiv').style.display="block";
    document.getElementById('uctrl-active').style.boxShadow="inset 0 0 4px 4px grey";
}
function open_notify()
{
    reset_zindex();
    document.getElementById("notificationdiv").style.zIndex="9";
    document.getElementById('notificationdiv').style.display="block";
    document.getElementById('notify-active').style.boxShadow="inset 0 0 4px 4px grey";
}
function open_notice()
{
    reset_zindex();
    document.getElementById("noticediv").style.zIndex="9";
    document.getElementById('noticediv').style.display="block";
    document.getElementById('notice-active').style.boxShadow="inset 0 0 4px 4px grey";
}
function open_project()
{
    reset_zindex();
    document.getElementById("project-window").style.display="block";
    document.getElementById("projectdiv").style.zIndex="9";
    document.getElementById('projectdiv').style.display="block";
    document.getElementById('project-active').style.boxShadow="inset 0 0 4px 4px grey";
}

function reset_zindex()
{
    document.getElementById("profilediv").style.zIndex="8";
    document.getElementById("chatdiv").style.zIndex="8";
    document.getElementById("noticediv").style.zIndex="8";
    document.getElementById("notificationdiv").style.zIndex="8";
    document.getElementById("uctrldiv").style.zIndex="8";
    document.getElementById("projectdiv").style.zIndex="8";
}