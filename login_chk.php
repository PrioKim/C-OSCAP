<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
    session_start();
    include_once('db_connect.php');
    $id = $_POST["id"];
    $pass = $_POST["pass"];

    if($_SESSION['is_login']=="YES"){
        ?>
        <script>
            alert("<?php echo $_SESSION['id']; ?>님 로그인 하신 상태입니다.");
            history.back();
         </script>
        <?php exit;
    }

    if(strlen($id)<1 || strlen($pass)<1){
        ?>    
        <script>
            alert("빈공간은 허용하지 않습니다.");
            history.back();
        </script>
        <?php exit;
    }
    $q="SELECT * FROM USER WHERE id='$id'";
    $result=$mysqli->query($q);

    if($result->num_rows==1){
        $sh=sha1($pass);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        if($row['passwd'] == $sh)
        {
            ?>
            <script>
                alert("<?php echo $id; ?>님 환영합니다.");
            </script>
            <?php
            $_SESSION['is_login']="YES";
            $_SESSION['id']=$id;
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
            exit;
        }
        else{
            ?>
            <script>
                alert("비밀번호가 틀렸습니다.");
                history.back();
            </script>
            <?php
            $_SESSION['is_login'] = "NO";
            $_SESSION['id']="";
            exit;
        }
    }
    else{
        ?>
        <script>
            alert("비인가된 접근입니다.");
            history.back();
        </script>
        <?php
        $_SESSION['is_login'] = "NO";
        $_SESSION['id']="";
        exit;
    }
?>
</body>
</html>
