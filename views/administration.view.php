<?php include("views/parts/header.inc.php") ?>

<body>

    <div class="bg-noir">
        <div class="container mx-auto px-20 py-10 min-h-screen">

          <div class="flex justify-between flex-wrap mb-16">
            <div>
              <h1 class="text-white text-4xl font-bold mb-4">Administration</h1>
              <h2 class="text-aqua text-xl font-bold mb-4">Bonjour <?= $utilisateur["prenom"] ?> !</h2>
            </div>
            <div class="menu flex mt-4">
              <span><a href="ajout-activite" class="font-bold p-3 px-6 pt-3 text-white bg-mauve rounded-md hover:bg-aqua cursor-pointer mb-7 text-center">Ajouter une activité</a></span>
              <span><a href="compte-deconnexion-submit" class="font-bold p-3 px-6 pt-3 text-white bg-mauve rounded-md hover:bg-red-500 cursor-pointer mb-7 ml-5 text-center">Déconnexion</a></span>
            </div>
          </div>

          <?php if (isset($_GET["erreur"])) : ?>
            <p class=" my-5 text-red-500 font-bold">Une erreur est survenue!</p>
          <?php elseif (isset($_GET["supression"])) : ?>
            <p class=" my-5 text-green-500 font-bold">L'activité a été supprimée!</p>
          <?php elseif (isset($_GET["succes"])) : ?>
            <p class=" my-5 text-green-500 font-bold">L'activité a été ajoutée!</p>
          <?php endif; ?>

          <section id="activites">

            <?php if(!$activites) : ?>
              <p class="text-white mb-7">Vous n'avez aucune activité pour le moment.</p>
              <span><a href="ajout-activite" class="font-bold p-3 px-6 pt-3 text-white bg-mauve rounded-md hover:bg-aqua cursor-pointer text-center">Créer votre première activité</a></span>
            <?php endif; ?>

            <?php foreach($activites as $activite) : ?>
              <hr class="opacity-30">
              <div class="activite py-10 flex justify-between text-white">
                <div class="flex">
                  <img src="<?= $activite["photo"] ?? "public/uploads/generique.jpg" ?>" alt="Image de l'activité" class="self-center mr-7 object-cover h-32 w-32 bg-aqua">
                  <div class="self-center">
                    <h2 class="text-xl font-bold"><?= $activite["nom"] ?></h2>
                    <p class="text-xs mt-1"><?= $activite["categorie_nom"] ?></p>
                  </div>
                </div>
                <a href="supression-submit?id=<?= $activite["id"] ?>" class="flex self-center bg-noir hover:bg-red-500 p-3 rounded-md">
                  <img src="public/images/bin.png" alt="" class="self-center">
                  <p class="self-center ml-2">Supprimer</p>
                </a>  
              </div>
            <?php endforeach; ?>

          </section>

        </div>
    </div>

</body>
</html>