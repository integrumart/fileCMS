# FileCMS Quick Start Guide

## 🚀 5-Minute Setup

### Step 1: Download
```bash
git clone https://github.com/integrumart/fileCMS.git
cd fileCMS
```

### Step 2: Upload
Upload all files to your web server's public directory.

### Step 3: Install
1. Open your browser and navigate to: `http://yoursite.com/install.php`
2. Fill in the form:
   - **Site Title**: My Website
   - **Site Slogan**: My awesome site
   - **Admin Username**: admin
   - **Admin Password**: (minimum 6 characters)
   - **Admin Email**: your@email.com (optional)
3. Click "Install FileCMS"

### Step 4: Login
1. Go to: `http://yoursite.com/admin`
2. Login with your credentials
3. Start creating content!

## 📝 Create Your First Page

1. In the admin dashboard, find "Create New Page"
2. Enter a **Page Title**: e.g., "About Us"
3. Write **Content** using Markdown:
   ```markdown
   # About Our Company
   
   We are a **great** company that does *amazing* things!
   
   [Visit our site](https://example.com)
   ```
4. Click "Create Page"
5. View your page at: `http://yoursite.com/about-us`

## 🎨 Markdown Quick Reference

```markdown
# H1 Heading
## H2 Heading
### H3 Heading

**Bold text**
*Italic text*

[Link text](url)
```

## 🔧 Common Tasks

### Change Site Title
Edit `bl-content/databases/site.php` and modify the `title` field.

### Add a User
Currently done through code. Feature will be added in future updates.

### Backup Your Site
Backup these folders:
- `bl-content/databases/`
- `bl-content/pages/`
- `bl-content/uploads/`

### Update Content
1. Login to admin panel
2. Find page in "All Pages" section
3. Edit and save (feature to be enhanced)

## 🐛 Troubleshooting

### Can't install?
- Check PHP version: `php -v` (needs 7.0+)
- Check permissions: `chmod -R 755 bl-content`

### Can't login?
- Clear browser cache
- Check username/password
- Verify `bl-content/databases/users.php` exists

### Pages not showing?
- Check .htaccess is uploaded
- Verify mod_rewrite is enabled on server
- Check `bl-content/databases/pages.php` exists

## 📞 Need Help?

- Read full documentation: [README.md](README.md)
- Detailed guide: [USER-GUIDE.md](USER-GUIDE.md)
- Open an issue on GitHub
- Check [CONTRIBUTING.md](CONTRIBUTING.md) for contribution guidelines

## ⚡ That's It!

You're ready to use FileCMS. Enjoy managing your content without a database!

---

**FileCMS** - Yükle, Kullan, Yönet! 🎉
