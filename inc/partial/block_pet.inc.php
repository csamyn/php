<?php
    if(isset($pet) && isset($nb)){
        $user = getUserForPet($pet);
?>
<div class="content-column <?php if($nb%2) { print 'even'; } else { print 'odd'; } ?>">
    <a href="profil_animal.php?id=<?php print $pet['id']; ?>"><img src="uploads/pet/<?php print $pet['id']; ?>.png" alt="Lapin"></a>
    <h4><?php print $pet['name']; ?></h4>
    <ul>
        <li><?php print _getCorrectAge($pet); ?></li>
        <li><?php print getCity($user['city']); ?></li>
        <li>Garder <?php print rand(2, 10); ?> jours</li>
    </ul>
    <a class="button" href="profil_animal.php?id=<?php print $pet['id']; ?>">Voir le profil</a>
</div><!-- end content-column -->
<?php } ?>