<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{base_url()}assets/css/style.css">
    <link rel="shortcut icon" type="image/png" href="{base_url()}assets/img/5151logo_fleur.ico" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>{$title}</title>
     <script src="https://kit.fontawesome.com/cefffb285d.js" crossorigin="anonymous"></script>
     <script src="{base_url()}assets/js/ckeditor/ckeditor.js"></script>
     <script> var base_url = "{base_url()}"; </script>
</head>

<body>
    <div id="principal">
        <header>
            <div class="headerLogo">
                <div>
                    {if $smarty.session.id}
                         <a href="{base_url()}users/profil">{$smarty.session.firstname}</a><span>/</span><a href="{base_url()}users/logout">Deconnexion</a>
                         {else}
                            <a href="{base_url()}pages/inscription">Inscription</a><span>/</span><a href="{base_url()}pages/connexion">Connexion</a>       
                    {/if}
                </div>
            </div>
            <div id="logo">
                <div class="element_logo">
                    <a href="{base_url()}"><img src="{base_url()}assets/img/logo_fleur.png" alt="Logo"></a>
                </div>
                <div id="element_titre">
                    <h1 class="titre">ECOMIE</h1>
                    <h2 class="sous_titre">L'association d'aujourd'hui</h2>
                </div>
            </div>
            <div class="menu">
                <input class="burger" type="checkbox">
                <nav>
                    <a href="{base_url()}">Accueil</a>
                    <a href="{base_url()}Articles/articles">Savoir-Faire</a>
                    <a href="{base_url()}Events/events">Evénements</a>
                    <a href="{base_url()}Galeries/galeries">Galerie</a>
                    <a href="{base_url()}pages/contact">Contact</a>
                </nav>
                {* <a class="connexion__mobile" href="{base_url()}pages/connexion"><img
                        src="{base_url()}assets/img/baseline_perm_identity_white_24dp.png" alt="Connexion">
                </a> *}
                <div class="connexion__mobile">
                    <div>
                        {if $smarty.session.id}
                            <a href="{base_url()}users/profil">{$smarty.session.firstname}</a><span>/</span><a href="{base_url()}users/logout">Deconnexion</a>
                            {else}
                                <a href="{base_url()}pages/inscription">Inscription</a><span>/</span><a href="{base_url()}pages/connexion">Connexion</a>       
                        {/if}
                    </div>
                </div>
            </div>
        </header>
