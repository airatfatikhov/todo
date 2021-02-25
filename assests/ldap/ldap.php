<?php
 $adServer = "10.1.0.3";
 $ldap = ldap_connect($adServer);
 $userName = $_POST['userName'];
 $password = $_POST['password'];
 $ldaprdn = 'dsk4' . "\\" . $userName;

 ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
 ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
 $bind = @ldap_bind($ldap, $ldaprdn, $password);
?>