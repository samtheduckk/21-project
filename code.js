let menuActive = false;

function openMenu(){
    if(menuActive == false){
    let menu = document.querySelector('aside')
    menu.style.flex = '0';
    menuActive = true;
}else if (menuActive == true){
    let menu = document.querySelector('aside')
    menu.style.flex = '30%';
    menuActive = false
}

}