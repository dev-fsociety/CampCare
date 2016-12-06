# CampCare

Site de l'équipe /dev/fsociety pour la [Nuit de l'Info édition 2016](http://www.nuitdelinfo.com/)

## Installation

1. Clonez le dépôt
2. Si ce n'est déjà fait, récupérez composer: `curl -s https://getcomposer.org/installer | php`
3. Se placer à la racine du dépôt fraîchement cloné et exécuter la commande suivante: `php /chemin/vers/composer.phar install`. Composer va télécharger tous les trucs qui font que CakePHP fonctionne par magie (on parle de CakeMagic, expression que vous allez potentiellement entendre au cours de la nuit)
4. Une fois installé, il vous restera la partie configuration, en gros il faut éditer le fichier **config/app.php** et renseigner les informations de connexion à la BDD. Si vous avez des problèmes à ce niveau là, votre chef d'équipe est là pour ça !
5. Et maintenant CODEZ !

Si vous avec besoin de plus d'informations, c'est tout expliqué là : [http://book.cakephp.org/3.0/en/quickstart.html](http://book.cakephp.org/3.0/en/quickstart.html)  
  
  
### TO DO !  
  
Eh oui, même si la Nuit s'est terminée, les projets eux ne le sont jamais !  
Nous pensons être arrivés à une version qui fonctionne plus ou moins bien, mais il reste encore (au moins) un point à implémenter:  
--> La suppression des données liées à d'autres qui disparaîtraient (par exemple: la disparition d'une catégorie doit entraîner la suppression de toutes ses catégories filles, ainsi que les items contenus dans chacune d'entre elles...)
