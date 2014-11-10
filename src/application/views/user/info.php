<div class="container">
    <form id="frmUserInfo" action="/index.php/user/userInfo" method="POST">
        <div class="header">
            <h3>Your information</h3>
            <p>Please update your latest information to this profile</p>
        </div>
        <div class="sep"></div>
        <div class="inputs">
            <table class="userTable">
                <td>
                    <table>
                        <tr>
                            <?php if ($avatar != '') : ?>
                                <img width="190px" height="205px" src='<?php echo "/images/avatars/$avatar"; ?>'></img>
                            <?php else : ?>
                                <img width="190px" height="205px" src="<?php echo '/images/avatars/default.gif'; ?>"></img>
                            <?php endif ?>
                        </tr>
                        <tr>
                            <input id='submit' type='submit' value='Change Avatar' name='btnChangeAvatar'>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>
                                <span>
                                    Gender:
                                </span>
                            </td>
                            <td >
                                <select name='txtGender' id='txtGender'>
                                    <?php if ($gender == 1) {
                                        echo  "<option value='Male'>Male</option>";
                                        echo "<option value='Female'>Female</option>";
                                        echo "<option value='Other'>Other</option>";
                                    } else if ($gender == 2) {
                                        echo  "<option value='Female'>Female</option>";
                                        echo  "<option value='Male'>Male</option>";
                                        echo "<option value='Other'>Other</option>";
                                    } else {
                                        echo  "<option value='Other'>Other</option>";
                                        echo  "<option value='Male'>Male</option>";
                                        echo  "<option value='Female'>Female</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>
                                    Fullname:
                                </span>
                            </td>
                            <td>
                                <?php
                                if (isset($fullname)) {
                                    echo "<input type='text' id='txtFullname' name='txtFullname' value='$fullname' placeholder='Fullname' autofocus >";
                                }else{
                                    echo "<input type='text' id='txtFullname' name='txtFullname' value='' placeholder='Fullname' autofocus >";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>
                                    Age:
                                </span>
                            </td>
                            <td>
                                <select name='txtAge' id="txtAge">
                                    <?php if ($age > 0) {
                                        echo  "<option value='$age'>$age</option>";
                                    }
                                    ?>
                                    <?php
                                    for ($i=1; $i<=100;$i++) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <table>
                                <tr>
                                    <td>
                                        <input id='submit' type='submit' value='Update' name='btnUpdateInfo'>
                                    </td>
                                    <td>
                                        <input id='submit' type='submit' value='Change Password' name='btnChangePassword'>
                                    </td>
                                </tr>
                            </table>
                        </tr>
                    </table>
                </td>
            </table>
        </div>
    </form>
</div>