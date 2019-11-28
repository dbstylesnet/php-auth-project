    let btns = document.getElementsByClassName('formtab');
    let a = ['loginform', 'signinform'];       
    for (let index of Object.keys(a).keys()) {     
        btns[index].addEventListener('click', function() {
            openTab(event, a[index]);
        });
    }

    function openTab(ev, formName) {
        let formTab, modalContent;

        modalContent = document.getElementsByClassName('modal-content');
        for (let modal of modalContent) {
            modal.style.display = "none";
        }

        formTab = document.getElementsByClassName('formtab');
        for (let tab of formTab) {
            tab.className = tab.className.replace(" active", "");
        }

        document.getElementById(formName).style.display = "block";
        ev.currentTarget.className += " active";
    }
