<?php


include "baseclass.php";
$class = new baseClass();

if (isset($_POST['contactForm'])) {
    @extract($_POST);
    $now = date('Y-m-d H:i:s');
    $data = "name = '$name',
    email = '$email',
    phone_number = '$phone_number',
    msg_subject = '$msg_subject',
    message = '$message',
    created_at = '$now'
    ";
    if ($class->insertData('contact_qry', $data)) {

        // print json_encode(array('type' => 'Success', 'msg' => 'User Added Successfully.'));
        //echo "success";
        $maildata = array(
            'page' => 'contact',
            'recipient_email' => 'jaikashyap22@gmail.com',
            'recipient_name' => 'Jai Kashyap',
            'sender_email' => 'contact@delhicoder.com',
            'sender_name' => 'Jaimru.com Query',
            'subject' => 'New Query - Jaimru.com',
            'message' => $data
        );

        if ($class->senMailSMTP($maildata) == 'sent') {
            echo "success";
        } else {
            echo "error";
        }

        exit;
    } else {
        // print json_encode(array('type' => 'Error', 'msg' => 'Server Error! Due to heavy Load'));
        exit;
    }
}

if (isset($_POST['newsletterForm'])) {
    @extract($_POST);
    $now = date('Y-m-d H:i:s');

    $data = "email = '$newsletter_email',
    created_at = '$now'
    ";
    if ($class->insertData('newsletter', $data)) {

        // print json_encode(array('type' => 'Success', 'msg' => 'User Added Successfully.'));
        echo "success";
        exit;
    } else {
        // print json_encode(array('type' => 'Error', 'msg' => 'Server Error! Due to heavy Load'));
        exit;
    }
}
