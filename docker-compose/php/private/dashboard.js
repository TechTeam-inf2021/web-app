
function info(id){
    const info = document.getElementsByClassName("info")[id]
    const info_button = document.getElementsByClassName("info_button")[id]
    console.log(id);
    if(info.style.display == 'none' ){
        info.style.display = 'inline';
        info_button.innerHTML = 'hide info';
    }else{
        info.style.display = 'none';
        info_button.innerHTML = 'show info';
    }
}