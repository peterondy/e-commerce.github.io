    <?php
    //localstorage.names = JSON.stringify(names);
    //var storedNames = JSON.parse(localStorage.names);

    
    /*var names = [];
    names[0] = prompt("New member name?");
    localStorage.setItem("names", JSON.stringify(names));

    //...
    var storedNames = JSON.parse(localStorage.getItem("names"));*/
    include 'init.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST'):

            //check if the user exist in the database
            if ($_POST['action'] == 'login'):

                $stmt = $con->prepare("SELECT ID,email,password FROM users WHERE email = ? AND userName=? AND password=?");
                $stmt->execute(array($_POST['email'], $_POST['user'], $_POST['pass']));
                $row = $stmt->fetch();
                $count = $stmt->rowCount();
                       
                if($count == 1):     //register session password?>
                    
                    <script type="text/javascript">

                        loginData = {
                            "ID" : "<?php echo $row['ID'];?>",
                            "email" : "<?php echo $row['email'];?>",
                            "password" : "<?php echo $row['password'];?>"
                        }
                        
                        localStorage.setItem('loginData', JSON.stringify(loginData));
                        
                        //localstorage.names = JSON.stringify(names);
                        
                        var loginDataArrayGet = JSON.parse(localStorage.loginData);

                        //console.log(loginDataArrayGet);

                    </script>

                    <?php header('Location: ' . $userDash . 'dashboard.php?id=' . $row['ID']);  //redirect to dashboard page

                    //exit();
                else:
                    echo "<h4 class='errorMessage alert alert-danger mt-5' role='alert'>Password Or Email No Correct Or User Not Found</h4>";
                endif;
            elseif ($_POST['action'] == 'signin'):
                    
                        $signinemail = $_POST['signEmail'];
                        $signinpass  = $_POST['signUser'];
                        $signinPass = $_POST['signPass'];
                        $confPass = $_POST['confPass'];
                        if ($signinPass == $confPass):

                            //add the user in the database

                            $stmt = $con->prepare("INSERT INTO users (email, userName, password) VALUES (:zemail, :zuser, :zpassword)");
                            $stmt->execute(array(
                                'zemail' => $signinemail, 
                                'zuser' => $signinemail, 
                                'zpassword' => $signinPass
                            ));

                                header('Location: confirm.php?lang='. $_GET['lang'] .'&email=' . $_POST['signEmail']);  //redirect to dashboard page


                        else:
                                echo "<h4 class='errorMessage alert alert-danger' role='alert'>Password and re-password not equal</h4>";
                                echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
                        endif;
            elseif ($_POST['action'] == 'admin'):

                $stmt = $con->prepare("SELECT ID,email FROM users WHERE email = ? AND userName=? AND password=? AND ID=0");
                $stmt->execute(array($_POST['email'], $_POST['user'], $_POST['pass']));
                $row = $stmt->fetch();
                $count = $stmt->rowCount();
                       
                if($count == 1):     //register session password
                    

                    header('Location: ' . $adminDash . 'dashboard.php?lang='. $_GET['lang']);  //redirect to dashboard page

                    exit();
                else:
                    echo "<h4 class='errorMessage alert alert-danger mt-5' role='alert'>This Page Also For Admin</h4>";
                    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";

                endif;
            endif;
        endif;


?>
