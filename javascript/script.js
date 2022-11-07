function nextFocus(inputF, inputS){
  document.addEventListener("keyup",function(event){
    if(event.key==='Enter'){
      console.log(event);
      document.getElementById(inputS).focus();
    }
  })
}

