
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $age = trim($_POST["age"]);
  $gender = trim($_POST["gender"]);
  $education = trim($_POST["education"]);
  $job = trim($_POST["job"]);
  $income = trim($_POST["income"]);

  // Check that all form fields are filled in
  if (empty($name) || empty($email) || empty($age) || empty($gender) || empty($education) || empty($job) || empty($income) || empty($message)) {
    http_response_code(400);
    echo "Please fill in all form fields.";
    exit;
  }

  // Set up email
  $to = "burakbaskaya158@gmail.com";
  $subject = "New form submission";
  $body = "Age: $age\n\nGender: $gender\n\nEducation: $education\n\nJob: $job\n\nIncome: $income";

  $headers = "From: $to";

  // Send email
  if (mail($to, $subject, $body, $headers)) {
    http_response_code(200);
    echo "Thank you! Your message has been sent.";
  } else {
    http_response_code(500);
    echo "Oops! Something went wrong and we couldn't send your message.";
  }

} else {
  http_response_code(403);
  echo "There was a problem with your submission, please try again.";
}
?>