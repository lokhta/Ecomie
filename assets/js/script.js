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
var commentForm = document.getElementById('comment');
var btnComment = document.getElementById('commentBtn');

// if(btnComment){
//     btnComment.addEventListener('click', function(){
//         commentForm.style.display = "block";
//     })
    
    editor('commentContent');
// }

