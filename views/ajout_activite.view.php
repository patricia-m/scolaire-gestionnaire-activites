<?php include("views/parts/header.inc.php") ?>

<body>

    <div class="bg-noir">
        <div class="container mx-auto px-20 py-10 h-screen text-center">

          <div class="flex justify-end mb-16">
            <a href="administration" class="p-3 px-6 pt-3 text-white bg-mauve rounded-md hover:bg-aqua cursor-pointer mb-7 text-center font-bold">Retour à l'administration</a>
          </div>

          <h1 class="text-aqua text-4xl font-bold mb-10">Ajouter une activité</h1>

          <?php if (isset($_GET["erreur_vide"])) : ?>
            <p class=" my-5 text-red-500 font-bold">Erreur! Le nom de l'activité et la catégorie sont obligatoires.</p>
          <?php endif; ?>

          <form action="ajout-activite-submit" method="POST" class="w-96 mx-auto flex flex-col justify-center" enctype="multipart/form-data">
            <input type="text" name="nom" class="w-96 p-2 mb-7 self-center rounded-md placeholder:italic focus:outline-none focus:ring-aqua focus:ring-2" placeholder="Nom de l'activité">

            <label for="categorie" class="text-left text-white mb-2">Catégorie :</label>
            <select name="categorie" class="w-96 p-2 mb-7 self-center rounded-md placeholder:italic focus:outline-none focus:ring-aqua focus:ring-2">
              <?php foreach($categories as $categorie) : ?>
                <option value="<?= $categorie["id"] ?>"><?= $categorie["nom"] ?></option>
              <?php endforeach; ?>
            </select>   
                 
            <input type="file" name="photo" class="w-96 self-center mt-3 mb-7 text-xs text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs
            file:bg-aqua file:text-white hover:file:bg-mauve">            
            <input type="submit" value="Ajouter l'activité" class="p-3 px-6 mt-3 pt-3 text-white bg-mauve rounded-full baseline hover:bg-aqua cursor-pointer self-center mb-7 font-bold">
        </form>

        </div>
    </div>

</body>
</html>