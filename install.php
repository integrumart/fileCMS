<?php
/**
 * FileCMS Installation Script
 * Easy setup - Upload and Use
 */

// Define constants
define('BLUDIT', true);
define('DS', DIRECTORY_SEPARATOR);
define('PATH_ROOT', __DIR__ . DS);
define('PATH_CONTENT', PATH_ROOT . 'bl-content' . DS);
define('PATH_DATABASES', PATH_CONTENT . 'databases' . DS);
define('PATH_PAGES', PATH_CONTENT . 'pages' . DS);

// Check if already installed
if (file_exists(PATH_DATABASES . 'site.php')) {
    header('Location: index.php');
    exit;
}

$error = '';
$success = false;

// Process installation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : 'admin';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $siteTitle = isset($_POST['site_title']) ? trim($_POST['site_title']) : 'FileCMS';
    $siteSlogan = isset($_POST['site_slogan']) ? trim($_POST['site_slogan']) : 'Advanced Flat-File CMS';
    
    if (empty($password)) {
        $error = 'Password is required!';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters!';
    } else {
        // Create directories
        @mkdir(PATH_DATABASES, 0755, true);
        @mkdir(PATH_PAGES, 0755, true);
        @mkdir(PATH_CONTENT . 'uploads', 0755, true);
        @mkdir(PATH_CONTENT . 'tmp', 0755, true);
        
        // Create site database
        $siteData = array(
            'title' => $siteTitle,
            'slogan' => $siteSlogan,
            'description' => 'A powerful flat-file content management system',
            'url' => '',
            'language' => 'en',
            'timezone' => 'UTC',
            'theme' => 'default',
            'itemsPerPage' => 10,
            'orderBy' => 'date',
            'uriPage' => '/page/',
            'uriTag' => '/tag/',
            'uriCategory' => '/category/',
            'homepage' => 'welcome',
            'pageNotFound' => '',
            'urlencode' => false,
            'autosave' => true,
            'currentBuild' => '1000',
            'admin' => $username
        );
        file_put_contents(PATH_DATABASES . 'site.php', json_encode($siteData, JSON_PRETTY_PRINT));
        
        // Create users database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $usersData = array(
            $username => array(
                'username' => $username,
                'password' => $hashedPassword,
                'email' => $email,
                'role' => 'admin',
                'registered' => date('Y-m-d H:i:s'),
                'firstName' => '',
                'lastName' => '',
                'nickname' => $username
            )
        );
        file_put_contents(PATH_DATABASES . 'users.php', json_encode($usersData, JSON_PRETTY_PRINT));
        
        // Create pages database with welcome page
        $pagesData = array(
            'welcome' => array(
                'title' => 'Welcome to FileCMS',
                'content' => "# Welcome to FileCMS!\n\nFileCMS is an advanced flat-file content management system based on the Bludit architecture.\n\n## Features\n\n- **Flat-File System**: No database required, all content stored in files\n- **Easy Installation**: Upload and use - no complicated setup\n- **Modern Interface**: Clean and intuitive admin panel\n- **Markdown Support**: Write content in Markdown\n- **Secure**: Built with security best practices\n- **Extensible**: Plugin and theme system\n- **Fast**: Optimized for performance\n\n## Getting Started\n\n1. Go to **/admin** to access the admin panel\n2. Login with your credentials\n3. Create new pages and manage your content\n4. Customize your site settings\n\nEnjoy using FileCMS!",
                'slug' => 'welcome',
                'key' => 'welcome',
                'date' => date('Y-m-d H:i:s'),
                'dateModified' => date('Y-m-d H:i:s'),
                'published' => true,
                'author' => $username,
                'tags' => array(),
                'category' => ''
            )
        );
        file_put_contents(PATH_DATABASES . 'pages.php', json_encode($pagesData, JSON_PRETTY_PRINT));
        
        // Create welcome page directory and content
        @mkdir(PATH_PAGES . 'welcome', 0755, true);
        $welcomeContent = "Title: Welcome to FileCMS\nContent:\n" . $pagesData['welcome']['content'];
        file_put_contents(PATH_PAGES . 'welcome' . DS . 'index.txt', $welcomeContent);
        
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Install FileCMS</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .install-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            text-align: center;
            color: #667eea;
            margin-bottom: 10px;
            font-size: 36px;
        }
        .subtitle {
            text-align: center;
            color: #999;
            margin-bottom: 30px;
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e8ed;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        input:focus {
            outline: none;
            border-color: #667eea;
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        button:hover {
            transform: translateY(-2px);
        }
        .error {
            background: #fee;
            color: #c33;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #fcc;
        }
        .success {
            background: #efe;
            color: #3c3;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            border: 1px solid #cfc;
        }
        .success h2 {
            margin-bottom: 10px;
        }
        .success a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .help-text {
            font-size: 12px;
            color: #999;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="install-container">
        <h1>FileCMS</h1>
        <div class="subtitle">Advanced Flat-File CMS - Installation</div>
        
        <?php if ($success): ?>
            <div class="success">
                <h2>✓ Installation Complete!</h2>
                <p>FileCMS has been successfully installed.</p>
                <a href="/admin">Go to Admin Panel</a>
                <a href="/">View Site</a>
            </div>
        <?php else: ?>
            <?php if ($error): ?>
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label for="site_title">Site Title</label>
                    <input type="text" id="site_title" name="site_title" value="FileCMS" required>
                </div>
                
                <div class="form-group">
                    <label for="site_slogan">Site Slogan</label>
                    <input type="text" id="site_slogan" name="site_slogan" value="Advanced Flat-File CMS" required>
                </div>
                
                <div class="form-group">
                    <label for="username">Admin Username</label>
                    <input type="text" id="username" name="username" value="admin" required>
                    <div class="help-text">This will be your login username</div>
                </div>
                
                <div class="form-group">
                    <label for="password">Admin Password</label>
                    <input type="password" id="password" name="password" required>
                    <div class="help-text">Minimum 6 characters</div>
                </div>
                
                <div class="form-group">
                    <label for="email">Admin Email</label>
                    <input type="email" id="email" name="email">
                    <div class="help-text">Optional</div>
                </div>
                
                <button type="submit">Install FileCMS</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
