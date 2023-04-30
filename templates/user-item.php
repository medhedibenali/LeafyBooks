<div class="profile ">
    <a href=<?="user-profile.php?$user->username" ?>>
    <img src=<?= $user->picture ?> class="profile_picture" />
    </a>
    <a class="profile_username"><?= $user->username ?></a>
    <div class="profile_fullname"> <span>:</span> <?= $user->first_name.' '.$user->last_name ?></div>

</div>