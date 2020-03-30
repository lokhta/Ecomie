    {include file="header.tpl" title="Ecomie - Connexion" name=$Name}
    <form action="index.php?ctrl=User_controller&action=login" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Adresse email</b></label>
                <input type="email" placeholder="Entrer votre adresse mail" name="userEmail" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="userPwd" required>

                <input type="submit" id='submit' value='Se connecter' >
    {include file="footer.tpl"}