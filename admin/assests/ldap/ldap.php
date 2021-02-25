<?php $ldap_server = "ldap://10.1.0.3";
$auth_user = "present";
$auth_pass = "present";
$base_dn = "OU=DSK Users,DC=dsk4,DC=local";
$filter = "(&(objectCategory=person)(objectClass=user)(department=$otdel))";
if (!($connect=@ldap_connect($ldap_server))) { die("Could not connect to ldap server"); }
//Включаем LDAP протокол версии 3
      ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
if (!($bind=@ldap_bind($connect, $auth_user, $auth_pass))) { die("Unable to bind to server"); }
if (!($search=@ldap_search($connect, $base_dn, $filter))) { die("Unable to search ldap server"); }
ldap_sort($connect, $search, 'sn');
$info = ldap_get_entries($connect, $search);
?>