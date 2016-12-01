<?php


// CHECKS FOR SIGNUP

/*
 * Check if there's bad characters in the name/lastname
 */
function checkName($s) {
    if (isset($s) && !empty($s)) {
        $regName = "/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#0-9]+/i";
        if (preg_match($regName, $s, $matches)) {
            echo($matches[0]);
            return (false);
        }
        else {
            return (true);
        }
    }
    return (true);
}

/*
 * Check the pseudo (set, unique, 3->10, [a-zA-Z0-9])
 */
function checkPseudo($s) {
    if (!isset($s) || empty($s)) {
        return (-1);
    }
    else if (!checkUnique('pseudo', $s)) {
        return (-2);
    }
    else if (strlen($s) > 10 || strlen($s) < 3) {
        return (-3);
    }
    else if (!ctype_alnum($s)) {
        return (-4);
    }
    return (0);
}

/*
 *  Check the email (set, unique, valid email)
 */
function checkEmail($s) {
    if (!isset($s) || empty($s)) {
        return (-1);
    }
    else if (!checkUnique('email', $s)) {
        return (-2);
    }
    else if (!(filter_var($s, FILTER_VALIDATE_EMAIL))) {
        return (-3);
    }
    return (0);
}

/*
 *  Check the password (set, mini 6 char, conf and pass equals)
 */
function checkPasswd($s, $s1) {
    if (!isset($s) || empty($s) ||
        !isset($s1) || empty($s1)) {
        return (-1);
    }
    else if (strlen($s) < 6) {
        return (-2);
    }
    if (strcmp($s, $s1)) {
        return (-3);
    }
    return (0);
}

// CHECK GOOD FORM
function check_form($hide)
{
    if (isset($_POST['hide']) && $_POST['hide'] === '123')
    {
        return (true);
    }
    return (false);
}


?>