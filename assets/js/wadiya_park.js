
 function newUserRegistration(){
    alert('hi');
    var form = document.getElementById('userRegistrationForm');
    var formdata = new FormData(form);
    
    var name = $('#name').val();
    var email_id = $('#email_id').val();
    
    formdata.append(name,name);
    formdata.append(email_id,email_id);
    
    console.log(formdata);
    return false;


    }