<?php if(isset($errors) && is_array($errors) && count($errors) > 0) { ?>
    <ul class="error-messages">
        <?php foreach($errors as $error) { ?>
            <li><?php print $error; ?></li>
        <?php } ?>
    </ul>
<?php } ?>