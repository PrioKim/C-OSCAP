<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <?php
    $id = $_POST["id"];
    $email = $_POST["email"];
    $pass_1 = $_POST["pass_1"];
    $pass_2 = $_POST["pass_2"];

    session_start();

    include_once('db_connect.php');
    if($_SESSION['is_login']=="YES"){
        ?>
        <script>
            alert("<?php echo $_SESSION['id']; ?>님 로그인 하신 상태입니다.");
            history.back();
         </script>
        <?php
        exit;
    }
    if($id=="" || $email=="" || $pass_1==""){

        ?>
        <script>
            alert("빈공간은 허용하지 않습니다.");
            history.back();
        </script>
        <?php exit;
    }
    if(strlen($pass_1)<5 || strlen($pass_1)>20 || strlen($email)>20 || strlen($id)>10){
        ?>
        <script>
            alert("4 < password < 21 & 1 < email,id < 11");
            history.back();
        </script>
        <?php exit;
    }
    if($pass_1!=$pass_2){
        ?>
        <script>
            alert("비밀번호를 잘못 입력하셨습니다.");
            history.back();
        </script>
        <?php exit;
    }
    if($pass_1==$id){
        ?>
        <script>
            alert("비밀번호가 안전하지 않습니다.");
            history.back();
        </script>
        <?php exit;
    }

    $qq="SELECT * FROM USER WHERE id='$id'";
    $result=$mysqli->query($qq);
    if($result->num_rows==1){
        $row=$result->fetch_array(MYSQLI_ASSOC);
        if($row['id']==$id){
            ?>
            <script>
                alert("<?php echo $id; ?>님 는(은) 이미 회원입니다.");
                history.back();
            </script>
            <?php exit;
        }
        else{
            ?>
            <script>
                alert("<?php echo $id; ?>는(은) 회원가입 가능한 아이디입니다.");
                history.back();
            </script>
            <?php exit;
        }
    }
    $sh=sha1($pass_1);
    $q = "INSERT INTO USER ( id, passwd, email ) VALUES ( '$id', '$sh', '$email' )";
    $mysqli->query($q);
    $mysqli->close();


$dst_dir = "/var/www/html/SCDC/" . $id;

if(@mkdir($dst_dir, 0755))
{
    ?>
    <script>
        alert("디렉토리 생성");
    </script>
    <?php
    if(is_dir($dst_dir)){
        @chmod($dst_dir, 0755);

        //echo "디렉토리 생성" . "<br>";
    }
}
/*
else {
    echo "디렉토리 생성 실패" . "<br>";
}
*/
?>

<script>
    alert("<?php echo $id; ?>님 회원가입이 완료되었습니다.");
</script>
<?php
    $_SESSION['is_login']="YES";
    $_SESSION['id']=$id;
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    exit;
 ?>
</body>
</html>
