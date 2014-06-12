<?php
    if(isset($user) && isset($nb)){
?>
<div class="content-column <?php if($nb%2) { print 'even'; } else { print 'odd'; } ?>">
    <img src="uploads/user/<?php print $user['id']; ?>.png" alt="" />
    <h4><?php print $user['username']; ?></h4>
    <ul>
        <li><?php print getCity($user['city']); ?></li>
        <li><?php print $user['age']; ?> ans</li>
        <li>Garde : <?php print _getGardes($user); ?></li>
    </ul>

    <a class="button" href="profil.php?id=<?php print $user['id']; ?>">Voir le profil</a>
</div><!-- end content-column -->
<?php } ?>