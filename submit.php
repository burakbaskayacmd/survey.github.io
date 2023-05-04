<?php
error_reporting(E_ALL);

if (isset($_POST['age']) && isset($_POST['gender']) && isset($_POST['education']) && isset($_POST['job']) && isset($_POST['income']) && isset($_POST['submit'])
) {
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $education = $_POST['education'];
  $job = $_POST['job'];
  $income = $_POST['income'];
  $submit = $_POST['submit'];

  $to = "burakbaskaya158@gmail.com";
  $subject = "Form submission";
  $body = "Age: $age\\nGender: $gender\\nEducation: $education\\nJob: $job\\nIncome: $income";

  $headers = "From: $to";

  if (mail($to, $subject, $body, $headers)) {
    echo "Thank you for your message!";
  } else {
    echo "Something went wrong. Please try again later.";
  }
}
?>