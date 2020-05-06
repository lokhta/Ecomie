/*******************
 CKeditor
 ******************/

function editor($field){
    CKEDITOR.replace($field);
}


// editor('commentContent');//Pour commentaire

let edit_com_btn = document.querySelectorAll('.edit_com_btn');

if(edit_com_btn){
    let comment_content = document.querySelectorAll('.comment_content');
    let edit_com = document.querySelectorAll('.edit_com');

    for(let i = 0; i<edit_com_btn.length; i++){
        edit_com_btn[i].addEventListener('click', function(){
            comment_content[i].style.display = 'none';
            edit_com[i].style.display = 'flex';
        })
    }
}

/*******************
Edit profil
 ******************/

let btn_edit_profil = document.querySelectorAll(".btn_edit_profil");
let btn_submit = document.querySelector('#btn_edit_profil');

if(btn_edit_profil){
    let field_profil = document.querySelectorAll('.field_profil');
    let info_user = document.querySelectorAll('.info_user');
    let btn_submit = document.querySelector('#btn_edit_profil');

    for(let i = 0; i<btn_edit_profil.length; i++){
        btn_edit_profil[i].addEventListener('click', function(){
            info_user[i].style.display = "none";
            field_profil[i].style.display = "flex";
            btn_submit.style.display = "flex";
        })

    }
}

 let btn_edit_photo = document.querySelector('.btn_edit_photo');
 if(btn_edit_photo){

    let userAvatar = document.querySelector('#userAvatar');
    let btn_del_photo = document.querySelector('.btn_del_photo');
    btn_edit_photo.addEventListener('click', function(){
        console.log('ok');
        btn_edit_photo.style.display = 'none';
        btn_del_photo.style.display = "none";
        userAvatar.style.display = "block";
    })
 }

 /****************************
 Article detail - admin
 ******************************/

 let event_btn = document.querySelector("#event_btn");

 if(event_btn){
     let display_content = document.querySelector('#display_content')

     event_btn.addEventListener('click', function(event){
        event.preventDefault();
        display_content.style.display = "block";
     });

 }

/****************************
 Ajax validation form contact
 ******************************/

 $(document).ready(function(){
    $('#form_val').on('submit', function(event){
        event.preventDefault();
        $.ajax({
        url: base_url+"forms/send_message",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $('#bouton__form').attr('disabled', 'disabled');
        },
        
            success:function(data){

                if(data.error){
                    if(data.name_error != ''){
                        $('#name_error').html(data.name_error);
                    } else {
                        $('#name_error').html('');
                    }

                    if(data.email_error != ''){
                        $('#email_error').html(data.email_error);
                    }else{
                        $('#email_error').html('');
                    }

                    if(data.subject_error != ''){
                        $('#subject_error').html(data.subject_error);
                    }else{
                        $('#subject_error').html('');
                    }

                    if(data.message_error != ''){
                        $('#message_error').html(data.message_error);
                    }else{
                        $('#message_error').html('');
                    }

                    if(data.message_error != ''){
                        $('#rgpd_error').html(data.rgpd_error);
                    }else{
                        $('#rgpd_error').html('');
                    }
                }    

                if(data.success)
                {
                    $('#success_message').html(data.success);
                    $('#name_error').html('');
                    $('#email_error').html('');
                    $('#subject_error').html('');
                    $('#message_error').html('');
                    $('#rgpd_error').html('');
                    $('#form_val')[0].reset();
                }

                $('#bouton__form').attr('disabled', false);
            }
        })
    });
});



