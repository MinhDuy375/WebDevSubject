<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Trang chủ</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
        
      font-family: 'Poppins', sans-serif;
      background: #f3f6fc;
      color: #333;
      padding: 30px;
    }
    .top-bar {
      text-align: center;
      margin-bottom: 40px;
    }
    .home-link {
      margin: 15px;
      padding: 10px 20px;
      border: 1px solid #ccc;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 500;
      color: #333;
      transition: 0.3s;
    }
    .home-link:hover {
      background: #333;
      color: #fff;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 22px;
    }
    .form-card {
        
      max-width: 450px;
      background: #fff;
      margin: 20px auto;
      padding: 25px 30px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }
    .form-card p {
      font-weight: 600;
      margin-bottom: 15px;
      font-size: 16px;
      color: #444;
      text-align: center;
      display: flex;
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
      font-weight: 500;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      outline: none;
      transition: border 0.3s;
    }
    input[type="text"]:focus {
      border-color: #4a90e2;
    }
    .btn-submit {
      display: block;
      width: 100%;
      padding: 12px;
      background: linear-gradient(135deg, #4a90e2, #7b61ff);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }
    .btn-submit:hover {
      opacity: 0.9;
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
  <div class="top-bar">
    <a class="home-link" href="../Week2.php">Về trang chủ</a>
  </div>

  <div class="form-card">
    <p>Form sử dụng POST</p>
    <form action="post.php" method="post">
      <div class="form-group">
        <label>Book Name</label>
        <input type="text" name="bookname">
      </div>
      <div class="form-group">
        <label>Author</label>
        <input type="text" name="author">
      </div>
      <div class="form-group">
        <label>Publishing House</label>
        <input type="text" name="publicinghouse">
      </div>
      <div class="form-group">
        <label>Release Year</label>
        <input type="text" name="releaseyear">
      </div>
      <button type="submit" class="btn-submit">Submit</button>
    </form>
  </div>

  <div class="form-card">
    <p>Form sử dụng GET</p>
    <form action="get.php" method="get">
      <div class="form-group">
        <label>Book Name</label>
        <input type="text" name="bookname">
      </div>
      <div class="form-group">
        <label>Author</label>
        <input type="text" name="author">
      </div>
      <div class="form-group">
        <label>Publishing House</label>
        <input type="text" name="publicinghouse">
      </div>
      <div class="form-group">
        <label>Release Year</label>
        <input type="text" name="releaseyear">
      </div>
      <button type="submit" class="btn-submit">Submit</button>
    </form>
  </div>
</body>
</html>
