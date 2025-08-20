<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Receipt Upload Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: rgba(255, 255, 255, 1);
      color: rgba(92, 92, 92, 1);
    }
    .container {
      max-width: 800px;
      margin: auto;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,.1);
    }
    .content {
        width: 100%;
        padding: 20px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .row {
      display: flex;
      gap: 15px;
      
    }
    .row .col {
      flex: 1;
    }
    label {
      font-weight: 600;
      display: block;
      margin-bottom: 5px;
    }
    small {
        display: block;
        margin-top: 5px;
        margin-bottom: 45px;
    }
    input[type=text], input[type=email], textarea {
      width: 80%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .checkbox-group {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 8px;
      margin-bottom: 20px;
    }
    .upload-box {
      border: 2px dashed #ccc;
      padding: 25px;
      text-align: center;
      width: 85%;
      cursor: pointer;
      
    }
    .upload-box:hover {
      border-color: #000;
    }
    .submit-btn {
       
      display: block;
      margin: 20px auto 0;
      padding: 10px 30px;
      background: linear-gradient(to bottom, #444, #000);
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
    }
    .submit-btn:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 style="padding-top: 35px;padding-bottom: 35px;">Payment Receipt Upload Form</h2>
    <hr>
    <div class="content">
    <form action="process.php" method="post" enctype="multipart/form-data">
       <label>Name</label>
    <div class="row">
        <div class="col">
          <input type="text" name="first_name" required><br>
          <small >First Name</small>
        </div>
        <div class="col">
          <input type="text" name="last_name" required> <br>
          <small >Last Name</small>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label>Email</label>
          <input type="email" name="email" required >
          <small >example@example.com</small>
        </div>
        <div class="col">
          <label>Invoice ID</label>
          <input type="text" name="invoice_id" required>
        </div>
      </div>

      <label>Pay For</label>
      <div class="checkbox-group">
        <label><input type="checkbox" name="payfor[]" value="15K Category"> 15K Category</label>
        <label><input type="checkbox" name="payfor[]" value="35K Category"> 35K Category</label>
        <label><input type="checkbox" name="payfor[]" value="55K Category"> 55K Category</label>
        <label><input type="checkbox" name="payfor[]" value="75K Category"> 75K Category</label>
        <label><input type="checkbox" name="payfor[]" value="116K Category"> 116K Category</label>
        <label><input type="checkbox" name="payfor[]" value="Shuttle One Way"> Shuttle One Way</label>
        <label><input type="checkbox" name="payfor[]" value="Shuttle Two Ways"> Shuttle Two Ways</label>
        <label><input type="checkbox" name="payfor[]" value="Training Cap Merchandise"> Training Cap Merchandise</label>
        <label><input type="checkbox" name="payfor[]" value="Compressport T-Shirt Merchandise"> Compressport T-Shirt Merchandise</label>
        <label><input type="checkbox" name="payfor[]" value="Buf Merchandise"> Buf Merchandise</label>
        <label><input type="checkbox" name="payfor[]" value="Other"> Other</label>
      </div>

      <label>Please upload your payment receipt.</label>
      <div class="upload-box">
        <input type="file" name="receipt" accept="image/*" required>
        <p>Drag and drop files here<br></p>
      </div>
        <small>jpg, jpeg, png, gif (1mb max.)</small>
      <label>Additional Information</label>
      <textarea name="additional_info" rows="4" placeholder="Type here..."></textarea>
    
      <button type="submit" class="submit-btn">Submit</button>
      <div style="
            text-align: center;
            margin-bottom: 50px;
            margin-top: 40px;">
        <a style="
            margin: 15px;
            padding: 10px 20px;
            border: 1px solid gray;
            text-decoration: none;
            border-radius: 5px;
            color: #333;
            :hover {
            background-color: lightgray;
            color: #333;
        }
        "
     
      href="../Week2.php">Về trang chủ</a>
    </div>
    </form>
    </div>
  </div>
</body>
</html>
