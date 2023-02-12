<?php include("views/parts/header.inc.php") ?>

<body>

    <div class="bg-noir">
        <div class="container mx-auto px-20 py-36 text-center min-h-screen">
            <h1 class="text-aqua text-4xl font-bold mb-7">Créer un compte</h1>

            <?php if (isset($_GET["erreur"])) : ?>
              <p class=" my-5 text-red-500 font-bold">Une erreur est survenue! Veuillez recommencer.</p>
            <?php elseif (isset($_GET["erreur_vide"])) : ?>
              <p class=" my-5 text-red-500 font-bold">Erreur! Tous les champs sont obligatoires.</p>
            <?php endif; ?>

            <form action="compte-creation-submit" method="post" class="flex flex-col">
              <input type="text" name="prenom" class="w-96 p-2 mb-7 self-center rounded-md placeholder:italic focus:outline-none focus:ring-aqua focus:ring-2" placeholder="Prénom">
              <input type="text" name="nom" class="w-96 p-2 mb-7 self-center rounded-md placeholder:italic focus:outline-none focus:ring-aqua focus:ring-2" placeholder="Nom">
              <input type="email" name="courriel" class="w-96 p-2 mb-7 self-center rounded-md placeholder:italic focus:outline-none focus:ring-aqua focus:ring-2" placeholder="Courriel">
              <input type="password" name="mot_de_passe" class="w-96 p-2 mb-7 self-center rounded-md placeholder:italic focus:outline-none focus:ring-aqua focus:ring-2" placeholder="Mot de passe">
              <input type="submit" value="Créer mon compte" class="p-3 px-6 pt-3 text-white bg-mauve rounded-full baseline hover:bg-aqua cursor-pointer self-center mb-7 font-bold">
              <p class="text-white text-xs font-bold"><a href="index" class=" underline text-aqua hover:text-mauve">Retour</a></p>
            </form>
            
        </div>
    </div>

</body>
</html>