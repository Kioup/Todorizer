    --><header>
        <div>
            <a href="<?php $url->get('deco'); ?>" class="green">Switch session</a>
            <a class="fill3" href="<?php $url->get('profil.php'); ?>" class="user">
                <i class="fas fa-user-circle"></i>
                <span>
                    <?php $user = unserialize($_SESSION['user']);
                    echo $user->getFirstname() . " " . $user->getName(); 
                    ?>
                </span>

            </a>
        </div>
    </header><!--