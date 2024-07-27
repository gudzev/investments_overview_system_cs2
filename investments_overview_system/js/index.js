var isHidden = false;
var menu = document.getElementById("menu");

function openMenu()
{
    if(isHidden == false)
    {
        menu.classList.add("menu-shrink");
        isHidden = true;
    }
    else
    {
        menu.classList.remove("menu-shrink");
        isHidden = false;
    }
} 