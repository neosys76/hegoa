<div class="titre">Compte Premium</div>
<?php
if(isset($_SESSION['account_id'])){$aller_a = "tdb";}
else {$aller_a = "accueil";}
?>
<a class="lien_fermer" href="index.php?page=<?php echo $aller_a; ?>">
<img class="image_fermer" name="image_fermer" src="images/connexion/fermer.png" >
</a>

<div class="compte_1">
Le compte Premium, c'est ...
</div>
