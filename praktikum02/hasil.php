<?php
$title = $_POST['title'];
$description = $_POST['description'];
$accountNumber = $_POST['account-number'];
$bank = $_POST['bank'];
$accountHolder = $_POST['account-holder'];
$transaction = $_POST['transaction'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];

$sendMobile = isset($_POST['send-mobile']) ? "Yes" : "No";
$sendEmail = isset($_POST['send-email']) ? "Yes" : "No";

$image = "";
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $file_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $file_name;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $image = $target_file;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Order Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: #ddd;
      padding: 10px 0;
      text-align: center;
      border-bottom: 1px solid #aaa;
    }

    .navbar a {
      text-decoration: none;
      color: #000;
      margin: 0 15px;
      font-size: 14px;
    }

    .container {
      width: 80%;
      max-width: 900px;
      background-color: #fff;
      margin: 30px auto;
      padding: 20px 30px;
      border: 1px solid #ccc;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      font-size: 20px;
      margin-bottom: 20px;
    }

    .form-layout {
      display: flex;
      gap: 30px;
    }

    .left-section {
      flex: 1;
      text-align: center;
    }

    .image-preview {
      width: 100%;
      height: 200px;
      border: 1px solid #aaa;
      background-color: #f9f9f9;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #888;
      margin-bottom: 10px;
    }

    .right-section {
      flex: 2;
    }

    .data-field {
      margin-bottom: 15px;
    }

    .data-field strong {
      display: inline-block;
      width: 150px;
    }

    .button {
      text-align: center;
      margin-top: 25px;
    }

    button {
      background-color: #0056b3;
      color: #fff;
      padding: 10px 25px;
      border: none;
      font-size: 15px;
      cursor: pointer;
    }

    button:hover {
      background-color: #003f88;
    }

    footer {
      text-align: center;
      font-size: 13px;
      color: #666;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <div class="navbar">
    <a href="#">Home</a> |
    <a href="#">Generate Link</a> |
    <a href="#">Transaction History</a> |
    <a href="#">Policy</a> |
    <a href="#">Logout</a>
  </div>

  <div class="container">
    <h2>Order Details</h2>

    <div class="form-layout">
      <div class="left-section">
        <div class="image-preview">
          <?php if ($image): ?>
            <img src="<?php echo $image; ?>" alt="Product Image" style="max-width:100%; max-height:200px;">
          <?php else: ?>
            No product image uploaded
          <?php endif; ?>
        </div>
      </div>

      <div class="right-section">
        <div class="data-field"><strong>Title:</strong> <?php echo htmlspecialchars($title); ?></div>
        <div class="data-field"><strong>Description:</strong> <?php echo htmlspecialchars($description); ?></div>
        <div class="data-field"><strong>Account Number:</strong> <?php echo htmlspecialchars($accountNumber); ?></div>
        <div class="data-field"><strong>Bank:</strong> <?php echo htmlspecialchars($bank); ?></div>
        <div class="data-field"><strong>Account Holder:</strong> <?php echo htmlspecialchars($accountHolder); ?></div>
        <div class="data-field"><strong>Transaction:</strong> <?php echo htmlspecialchars($transaction); ?></div>
        <div class="data-field"><strong>Send to Mobile:</strong> <?php echo $sendMobile; ?></div>
        <div class="data-field"><strong>Send to Email:</strong> <?php echo $sendEmail; ?></div>
        <div class="data-field"><strong>Mobile Number:</strong> <?php echo htmlspecialchars($mobile); ?></div>
        <div class="data-field"><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></div>
      </div>
    </div>

    <div class="button">
      <button onclick="window.history.back()">Back to Order</button>
    </div>
  </div>

</body>
</html>