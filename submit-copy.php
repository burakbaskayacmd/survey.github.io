<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $age = isset($_POST['age']) ? strip_tags($_POST['age']) : "-";
    $gender = isset($_POST['gender']) ? strip_tags($_POST['gender']) : "-";
    $education = isset($_POST['education']) ? strip_tags($_POST['education']) : "-";
    $job = isset($_POST['job']) ? strip_tags($_POST['job']) : "-";
    $income = isset($_POST['income']) ? strip_tags($_POST['income']) : "-";


    $question1of1 = isset($_POST['q-1-1']) ? strip_tags($_POST['q-1-1']) : "-";
    $question2of1 = isset($_POST['q-1-2']) ? strip_tags($_POST['q-1-2']) : "-";
    $question3of1 = isset($_POST['q-1-3']) ? strip_tags($_POST['q-1-3']) : "-";
    $question4of1 = isset($_POST['q-1-4']) ? is_array($_POST['q-1-4']) ? strip_tags(implode(", ", $_POST['q-1-4'])) : strip_tags($_POST['q-1-4']) : "-";
    $question5of1 = isset($_POST['q-1-5']) ? strip_tags($_POST['q-1-5']) : "-";
    $question6of1 = isset($_POST['q-1-6']) ? is_array($_POST['q-1-6']) ? strip_tags(implode(", ", $_POST['q-1-6'])) : strip_tags($_POST['q-1-6']) : "-";
    $question7of1 = isset($_POST['q-1-7']) ? strip_tags($_POST['q-1-7']) : "-";
    $question8of1 = isset($_POST['q-1-8']) ? strip_tags($_POST['q-1-8']) : "-";
    $question9of1 = isset($_POST['q-1-9']) ? strip_tags($_POST['q-1-9']) : "-";
    $question10of1 = isset($_POST['q-1-10']) ? strip_tags($_POST['q-1-10']) : "-";


    $question1of2 = isset($_POST['q-2-1']) ? strip_tags($_POST['q-2-1']) : "-";
    $question2of2 = isset($_POST['q-2-2']) ? strip_tags($_POST['q-2-2']) : "-";
    $question3of2 = isset($_POST['q-2-3']) ? strip_tags($_POST['q-2-3']) : "-";
    $question4of2 = isset($_POST['q-2-4']) ? is_array($_POST['q-2-4']) ? strip_tags(implode(", ", $_POST['q-2-4'])) : strip_tags($_POST['q-2-4']) : "-";
    $question5of2 = isset($_POST['q-2-5']) ? strip_tags($_POST['q-2-5']) : "-";
    $question6of2 = isset($_POST['q-2-6']) ? is_array($_POST['q-2-6']) ? strip_tags(implode(", ", $_POST['q-2-6'])) : strip_tags($_POST['q-2-6']) : "-";
    $question7of2 = isset($_POST['q-2-7']) ? strip_tags($_POST['q-2-7']) : "-";
    $question8of2 = isset($_POST['q-2-8']) ? strip_tags($_POST['q-2-8']) : "-";
    $question9of2 = isset($_POST['q-2-9']) ? strip_tags($_POST['q-2-9']) : "-";
    $question10of2 = isset($_POST['q-2-10']) ? strip_tags($_POST['q-2-10']) : "-";


    $question1of3 = isset($_POST['q-3-1']) ? strip_tags($_POST['q-3-1']) : "-";
    $question2of3 = isset($_POST['q-3-2']) ? strip_tags($_POST['q-3-2']) : "-";
    $question3of3 = isset($_POST['q-3-3']) ? strip_tags($_POST['q-3-3']) : "-";
    $question4of3 = isset($_POST['q-3-4']) ? is_array($_POST['q-3-4']) ? strip_tags(implode(", ", $_POST['q-3-4'])) : strip_tags($_POST['q-3-4']) : "-";
    $question5of3 = isset($_POST['q-3-5']) ? strip_tags($_POST['q-3-5']) : "-";
    $question6of3 = isset($_POST['q-3-6']) ? is_array($_POST['q-3-6']) ? strip_tags(implode(", ", $_POST['q-3-6'])) : strip_tags($_POST['q-3-6']) : "-";
    $question7of3 = isset($_POST['q-3-7']) ? strip_tags($_POST['q-3-7']) : "-";
    $question8of3 = isset($_POST['q-3-8']) ? strip_tags($_POST['q-3-8']) : "-";
    $question9of3 = isset($_POST['q-3-9']) ? strip_tags($_POST['q-3-9']) : "-";
    $question10of3 = isset($_POST['q-3-10']) ? strip_tags($_POST['q-3-10']) : "-";


    try {
        $db = new PDO("mysql:host=host;port=1254;dbname=db", "user", "pass");
        //$db->query("SET CHARACTER SET utf8");
    } catch ( PDOException $e ){
        print $e->getMessage();
    }

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->CharSet = 'UTF-8';
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'ssl://smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'tech.webservey@gmail.com';             // SMTP username
        $mail->Password   = 'pass';                     // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('tech.webservey@gmail.com', 'Survey | Web Site');
        $mail->addAddress('burakbaskaya158@gmail.com');     // Add a recipient

        $mail->addReplyTo('tech.webservey@gmail.com', 'Information');

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Survey Answer";
        $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<link type="text/css" rel="stylesheet" id="dark-mode-custom-link">
<link type="text/css" rel="stylesheet" id="dark-mode-general-link">
<style lang="en" type="text/css" id="dark-mode-custom-style"></style>
<style lang="en" type="text/css" id="dark-mode-native-style"></style>
<style lang="en" type="text/css" id="dark-mode-native-sheet"></style>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
    <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
    <!--[if gte mso 9]>
<xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
</xml>
<![endif]-->
</head>

<body>
    <div class="es-wrapper-color">
        <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#f6f6f6"></v:fill>
			</v:background>
		<![endif]-->
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table cellpadding="0" cellspacing="0" class="es-content esd-header-popover" align="center">
                            <tbody>
                                <tr>
                                    <td class="es-adaptive esd-stripe" align="center" esd-custom-block-id="88332">
                                        <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p10" align="left">
                                                        <!--[if mso]><table width="580"><tr><td width="280" valign="top"><![endif]-->
                                                        <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="280" align="left">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-infoblock" align="left">
                                                                                        <p><b>survey.guvensen.com</b></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width="20"></td><td width="280" valign="top"><![endif]-->
                                                        <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="280" align="left">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="right" class="es-infoblock esd-block-text">
                                                                                        <p><br></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-header" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" esd-custom-block-id="88600">
                                        <table class="es-header-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="border-top:1px solid #cccccc;border-bottom:1px solid #cccccc;">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p15t es-p5b es-p5r es-p5l" align="left">
                                                        <!--[if mso]><table width="590" cellpadding="0" cellspacing="0"><tr><td width="286" valign="top"><![endif]-->
                                                        <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="es-m-p20b esd-container-frame" width="286" align="left">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-empty-container" style="display: none;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width="20"></td><td width="284" valign="top"><![endif]-->
                                                        <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="284" align="left">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-empty-container" style="display: none;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table class="es-content-body" style="background-color: #ffffff;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p10t es-p10b es-p10r es-p10l" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="580" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10t" align="center">
                                                                                        <h2>Survey Answers</h2>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10t es-p5b es-p10r es-p10l" align="center">
                                                                                        <p style="font-size: 16px; line-height: 150%;">Basic Knowledge</p>
                                                                                    </td>
                                                                                </tr>
                                                                            <tr>
                                                                                <td class="esd-block-text es-p10t es-p5b es-p10r es-p10l">
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td><strong>Age</strong></td>
                                                                                            <td>:</td>
                                                                                            <td>'.$age.'</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><strong>Gender</strong></td>
                                                                                            <td>:</td>
                                                                                            <td>'.$gender.'</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><strong>Education</strong></td>
                                                                                            <td>:</td>
                                                                                            <td>'.$education.'</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><strong>Job</strong></td>
                                                                                            <td>:</td>
                                                                                            <td>'.$job.'</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><strong>Income</strong></td>
                                                                                            <td>:</td>
                                                                                            <td>'.$income.'</td>
                                                                                        </tr>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" esd-custom-block-id="3186" align="center">
                                        <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p5t" esd-general-paddings-checked="false" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="600" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-button" bgcolor="#f2f2f2" align="center"><span class="es-button-border" style="border-width: 0px; display: block; background: #f2f2f2;"><a class="es-button" target="_blank" style="color: #000000;  padding: 15px 0px; display: block; background: #f2f2f2; border-color: #f2f2f2;">Part - 1</a></span></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-button" bgcolor="#f2f2f2" style="padding:0px 0px 0px 15px">
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Question 1</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question1of1.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 2</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question2of1.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 3</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question3of1.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 4</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question4of1.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 5</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question5of1.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 6</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question6of1.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 7</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question7of1.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 8</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question8of1.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 9</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question9of1.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 10</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question10of1.'</td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div style="background: #f2f2f2 none repeat scroll 0% 0%; border-color: #000000; color: #000000; padding: 15px 0px 0px 0px; display: block"></div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p5t" esd-general-paddings-checked="false" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="600" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-button" bgcolor="#ffffff" align="center"><span class="es-button-border" style="border-width: 0px; background: #ffffff none repeat scroll 0% 0%; display: block;"><a  class="es-button" target="_blank" style="background: #ffffff none repeat scroll 0% 0%; border-color: #000000; color: #000000; padding: 15px 0px; display: block">Part - 2</a></span></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-button" bgcolor="#ffffff" style="padding:0px 0px 0px 15px">
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td>Question 1</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question1of2.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 2</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question2of2.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 3</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question3of2.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 4</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question4of2.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 5</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question5of2.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 6</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question6of2.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 7</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question7of2.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 8</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question8of2.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 9</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question9of2.'</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Question 10</td>
                                                                                                <td>:</td>
                                                                                                <td>'.$question10of2.'</td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div style="background: #ffffff none repeat scroll 0% 0%; border-color: #ffffff; color: #000000; padding: 15px 0px 0px 0px; display: block"></div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p5t" esd-general-paddings-checked="false" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                            <tr>
                                                                <td class="esd-container-frame" width="600" valign="top" align="center">
                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td class="esd-block-button" bgcolor="#f2f2f2" align="center"><span class="es-button-border" style="border-width: 0px; background: #f2f2f2 none repeat scroll 0% 0%; display: block;"><a  class="es-button" target="_blank" style="background: #f2f2f2 none repeat scroll 0% 0%; border-color: #000000; color: #000000; padding: 15px 0px; display: block">Part - 3</a></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="esd-block-button" bgcolor="#f2f2f2" style="padding:0px 0px 0px 15px">
                                                                                <table>
                                                                                    <tr>
                                                                                        <td>Question 1</td>
                                                                                        <td>:</td>
                                                                                        <td>'.$question1of3.'</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Question 2</td>
                                                                                        <td>:</td>
                                                                                        <td>'.$question2of3.'</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Question 3</td>
                                                                                        <td>:</td>
                                                                                        <td>'.$question3of3.'</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Question 4</td>
                                                                                        <td>:</td>
                                                                                        <td>'.$question4of3.'</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Question 5</td>
                                                                                        <td>:</td>
                                                                                        <td>'.$question5of3.'</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Question 6</td>
                                                                                        <td>:</td>
                                                                                        <td>'.$question6of3.'</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Question 7</td>
                                                                                        <td>:</td>
                                                                                        <td>'.$question7of3.'</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Question 8</td>
                                                                                        <td>:</td>
                                                                                        <td>'.$question8of3.'</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Question 9</td>
                                                                                        <td>:</td>
                                                                                        <td>'.$question9of3.'</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Question 10</td>
                                                                                        <td>:</td>
                                                                                        <td>'.$question10of3.'</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div style="background: #f2f2f2 none repeat scroll 0% 0%; border-color: #000000; color: #000000; padding: 15px 0px 0px 0px; display: block"></div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-footer" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" esd-custom-block-id="88333">
                                        <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0" align="center" style="border-top:1px solid #cccccc;">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p10t es-p10b es-p10r es-p10l" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="580" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-empty-container" style="display: none;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="esd-footer-popover es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p30t es-p30b es-p20r es-p20l" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-empty-container" style="display: none;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    } catch (Exception $e) {
        //echo "Bir hata oluştu lütfen daha sonra tekrar deneyin!";
    }

    $answers = [];

    $answers['Q-1-1'] = $question1of1;
    $answers['Q-1-2'] = $question2of1;
    $answers['Q-1-3'] = $question3of1;
    $answers['Q-1-4'] = $question4of1;
    $answers['Q-1-5'] = $question5of1;
    $answers['Q-1-6'] = $question6of1;
    $answers['Q-1-7'] = $question7of1;
    $answers['Q-1-8'] = $question8of1;
    $answers['Q-1-9'] = $question9of1;
    $answers['Q-1-10'] = $question10of1;

    $answers['Q-2-1'] = $question1of2;
    $answers['Q-2-2'] = $question2of2;
    $answers['Q-2-3'] = $question3of2;
    $answers['Q-2-4'] = $question4of2;
    $answers['Q-2-5'] = $question5of2;
    $answers['Q-2-6'] = $question6of2;
    $answers['Q-2-7'] = $question7of2;
    $answers['Q-2-8'] = $question8of2;
    $answers['Q-2-9'] = $question9of2;
    $answers['Q-2-10'] = $question10of2;

    $answers['Q-3-1'] = $question1of3;
    $answers['Q-3-2'] = $question2of3;
    $answers['Q-3-3'] = $question3of3;
    $answers['Q-3-4'] = $question4of3;
    $answers['Q-3-5'] = $question5of3;
    $answers['Q-3-6'] = $question6of3;
    $answers['Q-3-7'] = $question7of3;
    $answers['Q-3-8'] = $question8of3;
    $answers['Q-3-9'] = $question9of3;
    $answers['Q-3-10'] = $question10of3;


    $query = $db->prepare("INSERT INTO survey 
        ( age, gender, education, job, income, answer, created_at) 
    VALUES 
        (:age, :gender, :education, :job, :income, :answer, :created_at)");
    $insert = $query->execute(array(
        "age" => $age,
        "gender" => $gender,
        "education" => $education,
        "job" => $job,
        "income" => $income,
        "answer" => json_encode($answers),
        "created_at" => date("Y-m-d H:i:s")
    ));

    if($mail->send()){
        header("Location: https://survey.guvensen.com/?p=success");
        die();
    }
}
