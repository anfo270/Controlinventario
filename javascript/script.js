function nextFocus(inputF, inputS){
  document.getElementById(inputF).addEventListener('keydown', function (event){
    if(event.key==='Enter'){
      console.log(event);
      document.getElementById(inputS).focus();
    }
  })
}
