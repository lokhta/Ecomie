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


/*AJAX*/

/* Fonction pour cacher le message ajax*/
function hideMessage(){
    $("#success").html("");
}

 $(document).ready(function(){
/****************************
 Ajax validation page contact et inscription
 ******************************/
    $('#form_val').on('submit', function(event){
        event.preventDefault();
        $.ajax({
        url: $(this).attr("action"),
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

                    if(data.firstname_error != ''){
                        $('#firstname_error').html(data.firstname_error);
                    } else {
                        $('#firstname_error').html('');
                    }

                    if(data.email_error != ''){
                        $('#email_error').html(data.email_error);
                    }else{
                        $('#email_error').html('');
                    }

                    if(data.address_error != ''){
                        $('#address_error').html(data.address_error);
                    }else{
                        $('#address_error').html('');
                    }

                    
                    if(data.pwd_error != ''){
                        $('#pwd_error').html(data.pwd_error);
                    }else{
                        $('#pwd_error').html('');
                    }

                    if(data.confirmPwd_error != ''){
                        $('#confirmPwd_error').html(data.confirmPwd_error);
                    }else{
                        $('#confirmPwd_error').html('');
                    }


                    if(data.city_error != ''){
                        $('#city_error').html(data.city_error);
                    }else{
                        $('#city_error').html('');
                    }

                    if(data.cp_error != ''){
                        $('#cp_error').html(data.cp_error);
                    }else{
                        $('#cp_error').html('');
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
                    $('#success').html(data.success);
                    $('#name_error').html('');
                    $('#email_error').html('');
                    $('#subject_error').html('');
                    $('#message_error').html('');
                    $('#firstname_error').html('');
                    $('#address_error').html('');
                    $('#cp_error').html('');
                    $('#city_error').html('');
                    $('#pwd_error').html('');
                    $('#confirmPwd_error').html('');
                    $('#rgpd_error').html('');
                    $('#form_val')[0].reset();
                    setTimeout(hideMessage, 3000);
                }

                $('#bouton__form').attr('disabled', false);
            }
        })
    });


    /*Controle connexion AJAX */
    $("#form").on("submit", function(event){
        event.preventDefault();

        $.ajax({
            url: "http://localhost/ecomie/users/connexion",
            method: "POST",
            data:$(this).serialize(),
            dataType:"json",

            success: function(data){
                if(data.error){

                    if(data.error_email != ''){
                        $('#error_email').html(data.error_email);
                    } else {
                        $('#error_email').html('');
                    }

                    if(data.error_pwd != ''){
                        $('#error_pwd').html(data.error_pwd);
                    } else {
                        $('#error_pwd').html('');
                    }
                }else if(data.success){
                    window.location.href = data.redirect;
                }
                
            }
        });
    });
});


/**********************
 AJAX COMMENTAIRES
 ***************************/
function ajax_comment(url_page,get_name,get_value,path_page,author_id){
    function getComment(){
        let remote_url = base_url+"Comments/get_comment?"+get_name+"="+get_value;
        $.ajax({
            url: remote_url,
            method: 'get',
            dataType: "json",

            success:function(data){
                html = '';
                $.each(data, function(index, elem){
                    html += "<div class='comments'> <p> <span class='comment_author'>"+elem.author+"</span> le "+elem.date+" à "+elem.time+"</span>";
                    if(elem.commentAuthor == author_id){
                        html += "<button class='edit_com_btn btn'>Modifier</button>";
                        html+= "<a href='"+base_url+"Comments/edit_comment?"+get_name+"="+get_value+"&comment_id="+elem.commentId+"&amp;del_com=1' class='btn' id='del_com'>Supprimer</a> </p>"
                    }else{
                        html+= "<a href='"+url_page+"&comment_id="+elem.commentId+"&amp;report_com=1' class='btn'>Signaler</a>"
                    }
                    html += "<p>"+elem.commentContent+"</p><hr></div>";
                });
                if(html == ""){
                    $('#content_comments').html("<p>Aucun commentaires</p>");
                }else{
                    $('#content_comments').html(html); 
                }
            
            }             
        });
    }

    getComment();

    $("#form_com").on("submit", function(event){
        event.preventDefault();
        $.ajax({
            url: base_url+"Comments/add_comment?"+get_name+"="+get_value,
            method: "post",
            data: $(this).serialize(),
            dataType:"json",

            success:function(data){
                if(data.success){
                    $('#commentContent').html('');
                    getComment();
                }
            }
        });
    });
}



/* Ajax partager un article*/
function send_page_email(url){

    $("#share_form_content").css("display","none");
    $("#share_btn").on("click", function(){
        let html_email = "<label>Votre nom</label><input type='text' name='sender' id='sender' required><label>L'adresse email de votre ami(e)</label><input type='email' name='recipient' id='recipient' required><input type=checkbox name='url' value='"+url+"' checked style='display:none;'><input type='submit' id='do_send' value='Partager'>";
        $("#share_form_content").css("display","block");
        $("#share_form").append(html_email);
    })

    $("#share_form").on("submit", function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            method: "get",
            data:$(this).serialize(),
            dataType: "json",

            success: function(data){
                
                if(data.error){
                    $("#success").html(data.error);
                }else if(data.success){
                    $("#success").html(data.success);
                }
                
                //IMPORTANT CORRIGER EVENT : empêcher la création de plusieur formulaire quand on clique sur partager
                $("#share_form_content").css("display", "none");

                setTimeout(hideMessage, 3000);
            }

        });
    });
}






