<?php  session_start();
?>
<?php if(!empty($_POST['userName']) && !empty($_POST['password']))
{ 
    $userName = $_POST['userName'];
    if ($bind) {
        $filter="(sAMAccountName=$userName)";
        $result = ldap_search($ldap,"dc=dsk4,dc=local",$filter);
        $info = ldap_get_entries($ldap, $result);
        for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
              break;
              $firstName = $info[$i]["sn"][0];
              $name = $info[$i]["givenname"][0];
              $lastName = $info[$i]["samaccountname"][0];
              $ou = $info[$i]["department"][0];
              $description = $info[$i]["description"][0];
              $telephone = $info[$i]["telephone"][0];
              $userDn = $info[$i]["distinguishedname"][0]; 
              $userprincipalname=$info[0]['userprincipalname'][0];
              $employeeid=$info[0]['employeeid'][0];
              $otdel=$info[0]['department'][0];
                if ($otdel==='Отдел информационных технологий')
                {
                    $validuser = 1;
                    $employeeid = 1;
                    $status= 1;
                    $var_login = $userName;
                    $var_password = $password;
                    $var_name = $info[0]['cn'][0];
                    $var_ruc = $info[0]['manager'][0];
                    $otdels = $info[0]['department'][0];
                    $mail = $info[0]['mail'][0];
                    $doljnoct = $info[0]['title'][0];
                    $_SESSION['varname'] = $var_name;
                    $_SESSION['varruc'] = $var_ruc;
                    $_SESSION['userName'] = $userName;
                    $_SESSION['password'] = $var_password;
                    $_SESSION['managerid'] = $otdels;
                    $_SESSION['mail'] = $mail;
                    $_SESSION['title'] = $doljnoct;
                    echo json_encode(["status" => true]);
                }
                elseif ($otdel==='Супер группа')
                {
                    echo json_encode(["status_admin" => true]);
                }
            else
            {
              $status = 2;
            echo json_encode(["status" => false, "message" => "У вас нет доступа в портал составления плана"]);
            // $_SESSION['not_page'] = "У вас нет доступа в личный кабинет!";
            }

            //    $phot = $info[$i]["thumbnailphoto"][0];
            //    if(isset($info[$i]["thumbnailphoto"][0])) {
            //     $photo = base64_encode($info[$i]["thumbnailphoto"][0]);
            //    }
            //    else {
            //     $photo = "assests/image/profile.png";
            //    }
        }
        @ldap_close($ldap);
    } else {
        // $_SESSION['not_page'] = "Такой учётной записи в Active Directory нет!";
        echo json_encode(["status" => false, "message" => "Такой учётной записи в Active Directory нет!"]);
           }
}
?>