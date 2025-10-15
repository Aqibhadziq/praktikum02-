<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $title = $_POST["title"];
   $description = $_POST["description"];
   $accountNumber = $_POST["account-number"];
   $bank = $_POST["bank"];
   $accountHolder = $_POST["account-holder"];
   $transaction = $_POST["transaction"];
   $mobile = $_POST["mobile"];
   $email = $_POST["email"];

  if(isset($_POST["send-mobile"])) 
    {$sendMobile = "Yes";} else {$sendMobile = "No";}
  if(isset($_POST["send-email"])) 
    {$sendEmail = "Yes";} else {$sendEmail = "No";}
  if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) 
    
{$targetDir = "uploads/";if (!file_exists($targetDir)){mkdir($targetDir, 0777, true);}
  $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);$image = $targetFile;} else {$image = "";}}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Result</title>
</head>
<body style="font-family:Arial, sans-serif; background-color:#f2f2f2; margin:0; padding:20px;">

  <div style="width:80%; max-width:700px; margin:auto; background:#fff; padding:20px; border:1px solid #ccc;">
    <h2 style="text-align:center;">Order Result</h2>
    <table border="0" cellpadding="6" cellspacing="0" style="width:100%;">
      <tr><td><b>Title</b></td><td>: <?php echo $title; ?></td></tr>
      <tr><td><b>Description</b></td><td>: <?php echo $description; ?></td></tr>
      <tr><td><b>Account Number</b></td><td>: <?php echo $accountNumber; ?></td></tr>
      <tr><td><b>Bank</b></td><td>: <?php echo $bank; ?></td></tr>
      <tr><td><b>Account Holder</b></td><td>: <?php echo $accountHolder; ?></td></tr>
      <tr><td><b>Transaction</b></td><td>: <?php echo $transaction; ?></td></tr>
      <tr><td><b>Send to Mobile Phone</b></td><td>: <?php echo $sendMobile; ?></td></tr>
      <tr><td><b>Send to Email</b></td><td>: <?php echo $sendEmail; ?></td></tr>
      <tr><td><b>Mobile Number</b></td><td>: <?php echo $mobile; ?></td></tr>
      <tr><td><b>Email</b></td><td>: <?php echo $email; ?></td></tr>
      <tr>
        <td><b>Product Image</b></td>
        <td>
          <?php
          if ($image != "") {echo "<img src='$image' alt='Product Image' style='max-width:200px; border:1px solid #aaa;'>";} 
           else {echo "No product image uploaded.";}
          ?>
        </td>
      </tr>
    </table>

    <div style="text-align:center; margin-top:20px;">
      <a href="index.html" style="text-decoration:none; color:#fff; background:#28a745; padding:8px 18px; border-radius:4px;">Back to Order</a>
    </div>
  </div>

</body>
</html>