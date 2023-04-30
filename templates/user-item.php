<div class="profile ">
    <img src=<?= $user->profilePicture ?> class="profile-picture" />
    <div class="profile_info">
        <a class="profile-username"><?= $user->username ?></a>
        <div class="profile-fullname"> <span>:</span> <?= $user->firstName.' '.$user->lastName ?></div>
    </div>
</div>