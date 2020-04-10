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
    
editor('commentContent');//Pour commentaire


