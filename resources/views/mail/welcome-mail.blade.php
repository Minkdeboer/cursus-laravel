<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .footer {
            background: #f1f1f1;
            text-align: center;
            padding: 10px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Our Platform</h1>
        </div>
        <div class="content">
            <p>Hi, {{ $user->name }}</p>
            <p>We are excited to have you on board. This is a test email from Laravel, and we hope you enjoy your experience with us.</p>
            <p>If you have any questions, feel free to reach out to our support team.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Our Company. All rights reserved.</p>
        </div>
    </div>
</body>
</html>