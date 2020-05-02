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
 List membre
 ******************/

 let btn_edit_profil = document.querySelector('#btn_edit_role');

 if(btn_edit_profil){
     let user_role = document.querySelector("#user_role");
     let  role_list = document.querySelector('#role');
     let  btn_submit = document.querySelector('#btn_submit');

     btn_edit_profil.addEventListener('click', function(){
         console.log('ok');
         user_role.style.display = 'none';
         btn_edit_profil.style.display = 'none';
         role_list.style.display = 'block';
         btn_submit.style.display = 'block';
     })
 }

 let btn_edit_photo = document.querySelector('.btn_edit_photo');
 if(btn_edit_photo){

    let userAvatar = document.querySelector('#userAvatar');
    let btn_del_photo = document.querySelector('.btn_del_photo');
    btn_edit_photo.addEventListener('click', function(){
        btn_edit_photo.style.display = 'none';
        btn_del_photo.style.display = "none";
        userAvatar.style.display = "block";
    })
 }

 /* Ajax validation form contact */

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