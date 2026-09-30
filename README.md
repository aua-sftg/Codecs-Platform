# CODECS Platform

The CODECS platform is the digital hub of the [CODECS project](https://www.horizoncodecs.eu/) (*Maximising the CO-benefits of agricultural Digitalisation through conducive digital ECoSystems*). It showcases digital tools and research that support the adoption of digital technologies in agriculture, in line with a vision of sustainable digitalisation.

Live site: <https://digital-agriculture.horizoncodecs.eu/>

## What the platform offers

- **Digital Technologies Inventory**: more than 2,000 digital technologies in use across European agriculture, searchable by production sector and application scenario.
- **Inventory of Datasets**: a structured repository of CODECS datasets, including Living Lab datasets.
- **Assessment Toolkit**: calculators for evaluating digital technologies:
  - Economic Cost Calculator
  - Environmental Calculator
  - Technology Assessment Tool (TAT): ranks technologies with Entropy Weight Method and TOPSIS
  - Multicriteria Analysis Tool (MAT): analyses, compares and ranks the economic, environmental and social impacts reported by CODECS Living Labs
- **Storybooks**: flip-book stories from the CODECS Living Labs.
- **Methodological Handbook**
- **Virtual Tours**

## Technology stack

- [Laravel](https://laravel.com/) 9 (PHP ≥ 8.0.2)
- [MongoDB](https://www.mongodb.com/), via [`mongodb/laravel-mongodb`](https://github.com/mongodb/laravel-mongodb)
- [Backpack for Laravel](https://backpackforlaravel.com/) (CRUD and PRO) for the administration panel
- [Vite](https://vitejs.dev/) for front-end assets
- [Laravel Sail](https://laravel.com/docs/9.x/sail) (Docker) for local development

## Getting started

### Prerequisites

- PHP 8.0.2 or later, with the `mongodb` extension installed and enabled
- [Composer](https://getcomposer.org/)
- Docker, if you use Laravel Sail
- A MongoDB database
- A [Backpack PRO](https://backpackforlaravel.com/pricing) licence. `backpack/pro` is a paid package installed from Backpack's private Composer repository. Add your credentials to an `auth.json` file in the project root (it is git-ignored):

  ```json
  {
      "http-basic": {
          "repo.backpackforlaravel.com": {
              "username": "your-backpack-token-username",
              "password": "your-backpack-token-password"
          }
      }
  }
  ```

### Installation

1. Clone the repository.
2. Install PHP dependencies: `composer install`
3. Copy `.env.example` to `.env`, then set the MongoDB connection (`DB_DSN`, `DB_DATABASE`). Optionally set `SEED_ADMIN_NAME`, `SEED_ADMIN_EMAIL` and `SEED_ADMIN_PASSWORD` for the initial admin user.
4. Start the containers: `./vendor/bin/sail up --build -d`
5. Generate the application key: `./vendor/bin/sail artisan key:generate`
6. Install and build the front-end assets:
   ```bash
   ./vendor/bin/sail npm install
   ./vendor/bin/sail npm run build
   ```
7. Optionally create the initial admin user: `./vendor/bin/sail artisan db:seed`

## Licence

The CODECS platform source code is licensed under the [European Union Public Licence v. 1.2 (EUPL-1.2)](LICENSE).

Content published on the platform is licensed under [Creative Commons Attribution 4.0 International (CC BY 4.0)](https://creativecommons.org/licenses/by/4.0/).

### Third-party components

This repository also contains third-party components. They are **not** covered by the EUPL and remain under their own licences:

- **Porto theme (v9.9.3) by [Okler Themes](https://www.okler.net/)**, used for the front-end design. This includes `public/css/theme*.css`, `public/css/skins/`, `public/css/demos/`, `public/css/examples/`, `public/js/theme*.js`, `public/js/views/`, `public/img/demos/`, `public/php/` and the libraries bundled in `public/vendor/`. Each library in `public/vendor/` is covered by its own licence.
- **Assessment calculator bundles** in `public/assessment_tools/`, developed by CODECS project partners.
- **PHP and JavaScript dependencies** installed through Composer and npm, each under its own licence.

## Funding

<img src="public/img/co-funded-by-the-eu.svg" alt="Co-funded by the European Union" width="300">

CODECS has received funding from the European Union's Horizon Europe research and innovation programme under grant agreement No 101060179.

Views and opinions expressed are however those of the author(s) only and do not necessarily reflect those of the European Union. Neither the European Union nor the granting authority can be held responsible for them.
