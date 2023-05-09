<div class="user">
    <a href=<?= "user-template.php?username=$user->username" ?>>
        <img src=<?= $user->image ?> class="user_picture center" />
    </a>
    <div class="user_info center">
        <a class="user_username center" href=<?= "user-template.php?username=$user->username" ?>><?= $user->username ?></a>
        <div class="user_fullname center"> <span>:</span> <?= $user->first_name . ' ' . $user->last_name ?></div>
    </div>

</div>