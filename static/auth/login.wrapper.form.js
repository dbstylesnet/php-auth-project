document.addEventListener('DOMContentLoaded', function() {
    // Initialize: show login form by default
    document.getElementById('loginform').style.display = "block";
    document.getElementById('signinform').style.display = "none";
    
    let btns = document.getElementsByClassName('formtab');
    let forms = ['loginform', 'signinform'];       
    
    for (let i = 0; i < btns.length; i++) {
        btns[i].addEventListener('click', function(event) {
            openTab(event, forms[i]);
        });
    }

    function openTab(ev, formName) {
        let formTab, modalContent;

        // Hide all forms
        modalContent = document.getElementsByClassName('modal-content');
        for (let modal of modalContent) {
            modal.style.display = "none";
        }

        // Remove active class from all tabs
        formTab = document.getElementsByClassName('formtab');
        for (let tab of formTab) {
            tab.className = tab.className.replace(" active", "");
        }

        // Show selected form and activate tab
        document.getElementById(formName).style.display = "block";
        if (ev && ev.currentTarget) {
            ev.currentTarget.className += " active";
        }
    }
});
