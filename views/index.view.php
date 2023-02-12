<?php include("views/parts/header.inc.php") ?>

<body>

    <div class="bg-noir">
        <div class="container mx-auto px-20 py-52 text-center min-h-screen">
            <h1 class="text-aqua text-4xl font-bold mb-7">Connexion</h1>

            <?php if (isset($_GET["compte_succes"])) : ?>
                <p class=" my-5 text-green-500 font-bold">Votre compte a été créé! Vous pouvez maintenant vous connecter.</p>
            <?php elseif (isset($_GET["erreur"])) : ?>
                <p class=" my-5 text-red-500 font-bold">Une erreur est survenue! Veuillez recommencer.</p>
            <?php elseif (isset($_GET["deconnexion"])) : ?>
                <p class=" my-5 text-green-500 font-bold">Vous avez été deconnecté.</p>
            <?php endif; ?>

            <form action="compte-connexion-submit" method="POST" class="flex flex-col">
                <input type="text" name="courriel" class="w-96 p-2 mb-7 self-center rounded-md placeholder:italic focus:outline-none focus:ring-aqua focus:ring-2" placeholder="Courriel">
                <input type="password" name="mot_de_passe" class="w-96 p-2 mb-7 self-center rounded-md placeholder:italic focus:outline-none focus:ring-aqua focus:ring-2" placeholder="Mot de passe">
                <input type="submit" value="Connexion" class="font-bold p-3 px-6 pt-3 text-white bg-mauve rounded-full baseline hover:bg-aqua cursor-pointer self-center mb-7">
                <p class="text-white text-xs">Vous n’avez pas de compte ? <a href="compte-creation" class="font-bold underline text-aqua hover:text-mauve">Inscrivez-vous</a></p>                
            </form>
            
        </div>
    </div>

</body>
</html>