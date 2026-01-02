<div align="center">
    <h1>🐻 Beartropy Starter Kit</h1>
    <p><strong>The official starter kit for building applications with the Beartropy ecosystem.</strong></p>
    <p>Laravel • Livewire • Tailwind • Alpine • Beartropy UI • Beartropy Tables</p>
</div>

<div align="center">
    <a href="https://packagist.org/packages/beartropy/starter-kit"><img src="https://img.shields.io/packagist/v/beartropy/starter-kit.svg?style=flat-square&color=indigo" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/beartropy/starter-kit"><img src="https://img.shields.io/packagist/l/beartropy/starter-kit?style=flat-square&color=slate" alt="License"></a>
</div>

<br>

A production-ready starter kit pre-configured with the TALL stack and the Beartropy ecosystem. This kit provides the perfect foundation for building modern, responsive applications with **Beartropy UI** and **Beartropy Tables**.

## ✨ Key Features

*   **TALL Stack Pre-configured**: Laravel 12, Livewire 3.7, Tailwind CSS, and Alpine.js ready to go.
*   **Beartropy Ecosystem**: Comes pre-installed with `beartropy/ui` and `beartropy/tables`.
*   **Developer Experience**: Includes `laravel/pail`, `laravel/pint`, `pestphp/pest`, and `laravel/sail`.
*   **One-Command Setup**: Get up and running in seconds with our custom setup script.
*   **Unified Dev Server**: Run everything (server, queues, logs, vite) with a single command.

## 🚀 Installation

You can create a new project using Composer:

```bash
composer create-project beartropy/starter-kit my-app
```

Or clone the repository manually:

```bash
git clone https://github.com/beartropy/starter-kit.git my-app
cd my-app
```

### Setup

Once downloaded, run the setup command to install dependencies, configure the environment, and build assets:

```bash
composer setup
```

> **Note**: This script handles `composer install`, `.env` creation, key generation, migrations, seeding, and `npm` installation/building.

## 🛠️ Development

To start the development environment, simply run:

```bash
composer dev
```

This command uses [Concurrently](https://www.npmjs.com/package/concurrently) to run the following services simultaneously:
*   Laravel Server (`php artisan serve`)
*   Queue Worker (`php artisan queue:listen`)
*   Laravel Pail (`php artisan pail`)
*   Vite (`npm run dev`)

## � Documentation

*   **Beartropy UI**: [beartropy.com/ui](https://beartropy.com/ui)
*   **Beartropy Tables**: [beartropy.com/tables](https://beartropy.com/tables)
*   **Laravel**: [laravel.com/docs](https://laravel.com/docs)
*   **Livewire**: [livewire.laravel.com](https://livewire.laravel.com)

## 🤝 Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## 📄 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

> [!NOTE]
> **Disclaimer**: This software is provided "as is", without warranty of any kind, express or implied. Use at your own risk.
