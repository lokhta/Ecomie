/*******************
 CKeditor
 ******************/

function editor($field){
    CKEDITOR.replace($field);
}


/*******************
 Admin
 ******************/

//article => dashboard
editor('articleContent');


/*******************
 Site
 ******************/

 //Page article
    
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
