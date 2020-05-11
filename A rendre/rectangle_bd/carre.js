function fermerCompte(){
     var nClient = document.getElementsByName('nClient')[0].value;
    if(!/[0-9]{1,}/.test(nClient)){
     document.getElementsByName('nClient')[0].value = '';
    }
        
        var nCompte = document.getElementsByName('nCompte')[0].value;
    if(!/[0-9]{1,}/.test(nCompte)){
     document.getElementsByName('nCompte')[0].value = '';
    }
        
    }