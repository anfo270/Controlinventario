function nextFocus(inputF, inputS) {
    document.getElementById(inputF).addEventListener('keydown', function(event) {
      if (event.keyCode == 13) {
        document.getElementById(inputS).focus();
      }
    });
  }

