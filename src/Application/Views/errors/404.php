<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Không tìm thấy trang</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            max-width: 600px;
            padding: 20px;
        }
        h1 {
            font-size: 120px;
            margin: 0;
            color: #dee2e6;
            line-height: 1;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            color: #6c757d;
            margin-bottom: 30px;
        }
        .path-info {
            background: #e9ecef;
            padding: 5px 10px;
            border-radius: 4px;
            font-family: monospace;
            color: #e83e8c;
        }
        .btn-home {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Ôi! Trang này không tồn tại</h2>
        <p>Chúng tôi không thể tìm thấy trang tại đường dẫn: <span class="path-info"><?= htmlspecialchars($uri ?? $_SERVER['REQUEST_URI']) ?></span></p>
        <a href="/" class="btn-home">Về trang chủ</a>
    </div>
</body>
</html>