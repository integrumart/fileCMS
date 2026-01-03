# FileCMS User Guide

## Installation

### Requirements
- PHP 7.0 or higher
- Apache/Nginx web server
- mod_rewrite enabled (for clean URLs)

### Step-by-Step Installation

1. **Upload Files**
   - Download FileCMS from GitHub
   - Upload all files to your web server (public_html or htdocs)

2. **Set Permissions**
   ```bash
   chmod -R 755 bl-content
   ```

3. **Run Installation**
   - Navigate to `http://yoursite.com/install.php`
   - Fill in the installation form:
     - Site Title: Your website name
     - Site Slogan: A short description
     - Admin Username: Your login username
     - Admin Password: Secure password (minimum 6 characters)
     - Admin Email: Your email address (optional)
   - Click "Install FileCMS"

4. **Complete**
   - Installation creates necessary databases and default content
   - You can now access your site and admin panel

## Admin Panel

Access the admin panel at: `http://yoursite.com/admin`

### Login
- Enter your admin username and password
- Click "Login"

### Dashboard Features

#### Statistics
- Total Pages count
- Total Users count
- Current Version

#### Create New Page
1. Enter Page Title
2. Write Content (supports Markdown)
3. Click "Create Page"

#### Manage Pages
- View all existing pages
- Click "View" to see page on the frontend
- Pages are listed with title and creation date

### Creating Content

#### Markdown Support
FileCMS supports Markdown formatting:

```markdown
# Heading 1
## Heading 2
### Heading 3

**Bold text**
*Italic text*

[Link text](https://example.com)
```

#### Page Slugs
- Slugs are automatically generated from page titles
- Example: "About Us" becomes "about-us"
- Access pages at: `http://yoursite.com/slug-name`

## Frontend

### Navigation
- Home: View all pages
- Admin: Access admin panel

### Page Display
- Page title and content
- Publication date
- Author information
- Responsive design (mobile-friendly)

## File Structure

```
fileCMS/
├── bl-kernel/          # Core system
│   ├── admin/          # Admin interface
│   ├── helpers/        # Helper functions
│   └── class.*.php     # Core classes
├── bl-content/         # Your content
│   ├── databases/      # JSON databases
│   ├── pages/          # Page content files
│   ├── uploads/        # Uploaded files
│   └── tmp/            # Temporary files
├── bl-themes/          # Themes
│   └── default/        # Default theme
├── bl-plugins/         # Plugins
│   └── example-plugin/ # Example plugin
├── index.php           # Main entry point
└── install.php         # Installation script
```

## Customization

### Changing Theme
1. Create a new theme folder in `bl-themes/`
2. Copy theme files from default theme
3. Modify as needed
4. Update site configuration to use new theme

### Creating Plugins
1. Create folder in `bl-plugins/`
2. Create `plugin.php` extending Plugin class
3. Create `metadata.json` with plugin info
4. Implement plugin hooks

### Configuration
Edit site settings in `bl-content/databases/site.php` or through admin panel (when feature is added).

## Security

### Best Practices
1. Use strong passwords
2. Keep PHP updated
3. Regular backups of `bl-content/` directory
4. Protect install.php after installation
5. Use HTTPS when possible

### Backup
Backup these directories regularly:
- `bl-content/databases/`
- `bl-content/pages/`
- `bl-content/uploads/`

## Troubleshooting

### Installation Issues
- **Cannot create directories**: Check file permissions
- **PHP version error**: Upgrade to PHP 7.0+
- **Page not found**: Enable mod_rewrite

### Admin Login Issues
- Clear browser cache and cookies
- Check username and password
- Verify `bl-content/databases/users.php` exists

### Content Not Showing
- Verify page is published
- Check `bl-content/databases/pages.php`
- Check `bl-content/pages/` directory

## Support

For issues and questions:
- Open an issue on GitHub
- Check documentation
- Review CONTRIBUTING.md for guidelines

## Version History

See CHANGELOG.md for version history and updates.
