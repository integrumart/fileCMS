<!DOCTYPE html>
<html lang="<?php echo $site->language(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page->title(); ?> - <?php echo $site->title(); ?></title>
    <meta name="description" content="<?php echo $site->description(); ?>">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f5f7fa;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 20px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 48px;
            margin-bottom: 10px;
        }
        
        .header p {
            font-size: 18px;
            opacity: 0.9;
        }
        
        .nav {
            background: white;
            padding: 15px 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .nav a {
            color: #667eea;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .nav a:hover {
            background: #f5f7fa;
        }
        
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .content {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .page-title {
            font-size: 36px;
            color: #333;
            margin-bottom: 10px;
        }
        
        .page-meta {
            color: #999;
            font-size: 14px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e1e8ed;
        }
        
        .page-content {
            font-size: 16px;
            line-height: 1.8;
        }
        
        .page-content h1,
        .page-content h2,
        .page-content h3 {
            margin-top: 30px;
            margin-bottom: 15px;
            color: #333;
        }
        
        .page-content p {
            margin-bottom: 15px;
        }
        
        .page-content a {
            color: #667eea;
            text-decoration: none;
        }
        
        .page-content a:hover {
            text-decoration: underline;
        }
        
        .page-content img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin: 20px 0;
        }
        
        .page-content code {
            background: #f5f7fa;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
        }
        
        .footer {
            text-align: center;
            padding: 40px 20px;
            color: #999;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><?php echo $site->title(); ?></h1>
        <p><?php echo $site->slogan(); ?></p>
    </div>
    
    <div class="nav">
        <div class="nav-container">
            <a href="/">Home</a>
            <a href="/admin">Admin</a>
        </div>
    </div>
