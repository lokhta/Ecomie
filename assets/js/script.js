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