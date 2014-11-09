<div class="container" id="userInfo">
        <div class="header">
            <h3><?php echo "User information" ?></h3>
        </div>
        <div class="sep"></div>
        <div class="userFields">
            <div>
                <span>Email</span>
                <span><?php echo $user['email']; ?></span>
            </div>
            <div>
                <span>Fullname</span>
                <span><?php echo $user['fullname']; ?></span>
            </div>
            <div>
                <span>Gender</span>
                <span>
                    <?php if ($user['gender'] == 0) : ?>
                        <?php echo 'Male'; ?>
                    <?php elseif ($user['gender'] == 1) : ?>
                        <?php echo 'Female'; ?>
                    <?php else : ?>
                        <?php echo 'Other'; ?>
                    <?php endif ?>
                </span>
            </div>
            <div>
                <span>Age</span>
                <span><?php echo $user['age']; ?></span>
            </div>
        </div>
</div>
​