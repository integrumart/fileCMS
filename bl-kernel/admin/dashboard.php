<?php
global $site, $pages, $users;

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $token = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '';
    
    if (security_validateCsrfToken($token)) {
        switch ($action) {
            case 'new_page':
                $title = isset($_POST['title']) ? $_POST['title'] : '';
                $content = isset($_POST['content']) ? $_POST['content'] : '';
                $slug = text_slug($title);
                
                $pages->add($slug, array(
                    'title' => $title,
                    'content' => $content,
                    'published' => true,
                    'author' => $_SESSION['username']
                ));
                break;
                
            case 'logout':
                security_logout();
                header('Location: /');
                exit;
        }
    }
}

$allPages = $pages->getAll(false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - FileCMS</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f5f7fa;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 { font-size: 24px; }
        .header a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            background: rgba(255,255,255,0.2);
            border-radius: 5px;
        }
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .card h2 {
            margin-bottom: 20px;
            color: #333;
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
        textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e8ed;
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
        }
        textarea {
            min-height: 200px;
            resize: vertical;
        }
        button {
            padding: 12px 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }
        button:hover {
            opacity: 0.9;
        }
        .pages-list {
            list-style: none;
        }
        .pages-list li {
            padding: 15px;
            border-bottom: 1px solid #e1e8ed;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .pages-list li:last-child {
            border-bottom: none;
        }
        .page-title {
            font-weight: 600;
            color: #333;
        }
        .page-date {
            color: #999;
            font-size: 12px;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .stat-number {
            font-size: 36px;
            font-weight: bold;
            color: #667eea;
        }
        .stat-label {
            color: #999;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>FileCMS Admin</h1>
        <div>
            <a href="/">View Site</a>
            <form method="POST" style="display: inline;">
                <input type="hidden" name="action" value="logout">
                <input type="hidden" name="csrf_token" value="<?php echo security_csrfToken(); ?>">
                <button type="submit" style="background: transparent; border: 2px solid white;">Logout</button>
            </form>
        </div>
    </div>
    
    <div class="container">
        <div class="stats">
            <div class="stat-card">
                <div class="stat-number"><?php echo count($allPages); ?></div>
                <div class="stat-label">Total Pages</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $users->count(); ?></div>
                <div class="stat-label">Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo BLUDIT_VERSION; ?></div>
                <div class="stat-label">Version</div>
            </div>
        </div>
        
        <div class="card">
            <h2>Create New Page</h2>
            <form method="POST">
                <input type="hidden" name="action" value="new_page">
                <input type="hidden" name="csrf_token" value="<?php echo security_csrfToken(); ?>">
                
                <div class="form-group">
                    <label for="title">Page Title</label>
                    <input type="text" id="title" name="title" required>
                </div>
                
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" required></textarea>
                </div>
                
                <button type="submit">Create Page</button>
            </form>
        </div>
        
        <div class="card">
            <h2>All Pages</h2>
            <?php if (empty($allPages)): ?>
                <p>No pages yet. Create your first page above!</p>
            <?php else: ?>
                <ul class="pages-list">
                    <?php foreach ($allPages as $pageData): ?>
                        <li>
                            <div>
                                <div class="page-title"><?php echo htmlspecialchars($pageData['title']); ?></div>
                                <div class="page-date"><?php echo $pageData['date']; ?></div>
                            </div>
                            <a href="/<?php echo $pageData['slug']; ?>" target="_blank">View</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
