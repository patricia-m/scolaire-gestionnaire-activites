# scolaire-gestionnaire-activites

## Programmation web avancée
# Épreuve-synthèse pratique (30 points)

Le mandat de cet exercice est de créer un site web qui affiche une liste d’activités: un exemple d'activités serait d'aller se promener en nature.  
- Une activité a un nom, une photo, une catégorie et une date de création.  
- Une catégorie a un nom.
   
<br>

L’utilisateur peut se connecter dans une page de connexion pour accéder à la page d'administration lui permettant de consulter, d’ajouter et de supprimer des activités dans la liste.  
- Les utilisateurs ne peuvent consulter ou supprimer que les activités qu'ils ont ajoutés eux-mêmes.  
- Un utilisateur a un nom, un prénom, un courriel, un mot de passe et une date de création du compte.  
  
<br>

**L’ensemble du projet devra être réalisé à l’aide de la structure MVC orientée-objet créée au cours des cours précédents.** 



  

---

## Liste des pages


<br>

### Création d'un compte
>1. Formulaire de création d'un compte où les informations nécessaires sont récupérées
>1. Lors d'une erreur, un message approprié doit être affiché dans la page
>1. Lors d'une création de compte réussie, on redirige au formulaire de connexion

<br>

### Accueil/Connexion
>1. Formulaire de connexion avec courriel et mot de passe
>1. Lors d'une erreur de connexion, un message approprié doit être affiché dans la page
>1. Lors d'une connexion réussie, on redirige à la page d'administration
>1. Lien vers le formulaire de création d'un compte

<br>

### Administration
>1. Affichage de la liste des activités *associées* à l'utilisateur avec nom, photo et catégorie
>1. Inclure un bouton de suppresion d'une activité
>1. Inclure un bouton de déconnexion: déconnexion suivie d'une redirection à l'accueil
>1. Lien vers la page d'ajout d'une activité

<br>

### Ajout d'activités
>1. Formulaire d'ajout d'une activité avec nom, photo et catégorie
>1. Lien de retour à la page d'administration

<br>

### Exigences spécifiques et mentions
>- Le projet doit être remis dans une archive .zip nommée **pwa_NOM_prenom.zip**, contenant le code du projet et la script .sql de la BDD
>- Les routes des pages d'administration (liste, ajout, suppression) doivent être protégées: on ne peut pas y accéder sans être connecté
>- Les routes qui servent à traiter un formulaire doivent aussi être "protégées": on ne peut pas y accéder sans la soumission d'un formulaire
>- Le mot de passe de l'utilisateur doit être encrypté
>- Le style visuel n'est pas évalué, mais un effort minimal est attendu (CSS, Sass, Bootstrap et/ou Tailwind permis)  

>- Vous n'avez **pas** à implémenter la *modification* d'une activité
>- Vous n'avez **pas** à générer une documentation externe