<?php
ini_set("display_errors", "1");

session_start();

$language = $_POST["language"];
$project_name = $_POST["project_name"];
$user_id = $_SESSION["id"];
//$user_id = "koawoo";

$upload_file_tmp_name = $_FILES["upload_file"]["tmp_name"];
$upload_file_name = $_FILES["upload_file"]["name"];
//$save_dir = $user_id . "/";
$save_dir = "/var/www/html/SCDC/". $user_id. "/";

$dest = $save_dir . $upload_file_name;  //파일을 저장할 디렉토리 및 파일명

//echo "file error:".$_FILES['upload_file']['error']."<br>";echo "<br>";echo "<br>";
//echo "<pre>".print_r($_FILES,true)."</pre>";echo "<br>";echo "<br>";
//echo $upload_file_name . "<br>";
//echo $upload_file_tmp_name . "<br>";

if(isset($_POST['submit'])) {
    //파일이 HTTP POST 방식을 통해 정상적으로 업로드되었는지 확인한다.
    if(is_uploaded_file($upload_file_tmp_name)
        && is_zip_file($upload_file_name)){ // zip 파일인지 확인
        //echo "업로드한 파일명 : " . $upload_file_name."<br>";
        //파일을 지정한 디렉토리에 저장
        if(move_uploaded_file($upload_file_tmp_name, $dest))
        {
            $dst_dir = extract_zip_file($upload_file_name, $user_id);
            $doxy_config = config_doxyfile($language, $project_name, $dst_dir, $user_id);
            $cmd = "doxygen ". $doxy_config . " &";
            include_once('db_connect.php');


            $output = shell_exec($cmd);
            $main_page = $user_id . "/" . $project_name."/html";
            $q="INSERT INTO PROJECT (user_id, prj_name, doxy_path) VALUES ('$user_id', '$project_name', '$main_page' )";
            $mysqli->query($q);
            $mysqli->close();

            echo "<meta http-equiv='refresh' content='0; url=loading.php'>";
        }
        else
            die("fail2");
    }
    else
    {
        echo "fail1";
    }
}

function is_zip_file($file_name)
{
    $file_name_lower = strtolower($file_name);
    $tmp = explode(".", $file_name_lower);
    $ext = $tmp[count($tmp)-1];

    if(strcmp("zip", $ext) == 0)
        return 1;
    else{
        ?>
        <script>
            alert("zip로 압축한 파일만 제출해주세요.");
        </script>
        <?php
        echo "<meta http-equiv='refresh' content='0; url=input.php'>";
        exit;
        return 0;
    }
}

function remove_ext($file_name)
{
    $tmp = substr($file_name, 0, strlen($file_name)-4);

    return $tmp;
}

function extract_zip_file($file_name, $user_id)
{
    $zip = new ZipArchive;
    $dst_dir = remove_ext($file_name);
    $dst_dir = "/var/www/html/SCDC/". $user_id . "/" . $dst_dir;
    $file_name = "/var/www/html/SCDC/". $user_id . "/" .  $file_name;

    if(@mkdir($dst_dir, 0755))
    {
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


    // 압축파일이 있는 위치를 지정합니다.
    $res = $zip->open($file_name);
    if (($res === TRUE) && (file_exists($dst_dir) === TRUE)) {
        //echo '압축파일 오픈에 성공하였습니다.' . "<br>";
        // 다음 디렉토리 위치에 압축파일을 해제하도록 하겠습니다.
        $zip->extractTo($dst_dir);

        // 모든 작업이 완료되었으면 닫습니다.
        $zip->close();
        //echo "ok";
    }
    else
    {
    // 압축파일 오픈에 실패하면 에러코드를 표시합니다.
        if(ZIPARCHIVE::ER_NOZIP === $res) {
            echo '압축파일을 찾을 수 없습니다.';
        }
    }

    return $dst_dir;
}

function config_doxyfile($language, $project_name, $src_dir, $user_id)
{
    $home = "/var/www/html/SCDC/";
    $input_dir = $src_dir;
    $dst_dir = $home . $user_id. "/" . $project_name;
    $oldfile = $home . "Config/";
    $newfile = $home . $user_id . "/" . "Doxyfile";

    //echo $input_dir . "<br>";
    //echo $dst_dir . "<br>";

    switch($language)
    {
        case "C":
            $oldfile = $oldfile . "Doxyfile_C";
        break;
        case "C++":
            $oldfile = $oldfile . "Doxyfile_C++";
        break;
        case "Java":
            $oldfile = $oldfile . "Doxyfile_JAVA";
        break;
        case "Fortran":
            $oldfile = $oldfile . "Doxyfile_Fortran";
        break;
        case "VHDL":
            $oldfile = $oldfile . "Doxyfile_VHDL";
        break;
        case "Python":
            $oldfile = $oldfile . "Doxyfile_Python";
        break;
    }
    /*
    if(file_exists($oldfile)){
        if(!copy($oldfile, $newfile))
            echo "doxyfile cp fail";
        else if (file_exists($newfile))
            echo "doxyfile cp success";
    }
    */
    copy($oldfile, $newfile);

    $cmd = "crudini --set --existing ". $newfile . " \"\" PROJECT_NAME " . $project_name;
    $output = shell_exec($cmd);

    $cmd = "crudini --set --existing ". $newfile . " \"\" OUTPUT_DIRECTORY " . $dst_dir;
    $output = shell_exec($cmd);

    $cmd = "crudini --set --existing ". $newfile . " \"\" INPUT " . $input_dir;
    $output = shell_exec($cmd);

    return $newfile;
}



?>
