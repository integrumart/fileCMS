# Contributing to FileCMS

Thank you for considering contributing to FileCMS! This document outlines the process for contributing to this project.

## Code of Conduct

By participating in this project, you agree to maintain a respectful and inclusive environment.

## How Can I Contribute?

### Reporting Bugs

Before creating bug reports, please check the existing issues. When creating a bug report, include:

- **Clear title and description**
- **Steps to reproduce**
- **Expected behavior**
- **Actual behavior**
- **Screenshots** (if applicable)
- **Environment details** (PHP version, server, browser)

### Suggesting Enhancements

Enhancement suggestions are tracked as GitHub issues. When creating an enhancement suggestion, include:

- **Clear title and description**
- **Detailed explanation** of the feature
- **Why this would be useful**
- **Possible implementation** (if you have ideas)

### Pull Requests

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Make your changes
4. Test your changes thoroughly
5. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
6. Push to the branch (`git push origin feature/AmazingFeature`)
7. Open a Pull Request

#### Pull Request Guidelines

- Follow the existing code style
- Write clear commit messages
- Update documentation if needed
- Add tests if applicable
- Ensure all tests pass
- Keep PRs focused on a single feature/fix

## Development Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/integrumart/fileCMS.git
   cd fileCMS
   ```

2. Set up a local PHP server:
   ```bash
   php -S localhost:8000
   ```

3. Access the installation at `http://localhost:8000/install.php`

## Coding Standards

### PHP

- Follow PSR-2 coding standards
- Use meaningful variable and function names
- Comment complex logic
- Keep functions small and focused
- Avoid deep nesting

### Security

- Always sanitize user input
- Use prepared statements (when applicable)
- Validate CSRF tokens
- Use secure password hashing
- Escape output

### File Structure

```
bl-kernel/          # Core system files
bl-content/         # Content storage
bl-themes/          # Themes
bl-plugins/         # Plugins
```

## Documentation

- Update README.md if you change functionality
- Add inline comments for complex code
- Update CHANGELOG.md
- Write clear commit messages

## Testing

Before submitting a PR:

1. Test installation process
2. Test admin panel functionality
3. Test content creation/editing
4. Test user authentication
5. Check for security vulnerabilities
6. Test on different PHP versions (if possible)

## Questions?

Feel free to open an issue for any questions or concerns.

## License

By contributing, you agree that your contributions will be licensed under the MIT License.
