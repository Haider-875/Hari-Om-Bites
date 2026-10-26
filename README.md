# Hari Om Cuisine of India — Laravel Recreation

A pixel-perfect recreation of the [Hari Om Cuisine of India website](https://hari-om-bites.base44.app/) built with **Laravel 11 / PHP 8.3+**, **Blade Components**, **Bootstrap 5**, **Alpine.js**, and **SQLite / MySQL**.

---

## 🍽️ Project Overview

This project is a high-fidelity website reverse-engineering and reconstruction of the authentic Indian restaurant located in Fairbanks, Alaska:
- **Restaurant Name**: Hari Om Cuisine Of India
- **Address**: 1528 S Cushman St, Fairbanks, AK 99701, United States
- **Phone**: +1 907-328-3218 (`tel:+19073283218`)
- **Hours**: Tuesday – Sunday: 11:30 AM – 2:30 PM & 4:30 PM – 9:00 PM; Monday: Closed
- **Original Source**: Client-rendered Base44 React application
- **Reconstruction Architecture**: Full-stack MVC Laravel application with server-side rendering, SEO metadata, reactive digital menu browsing, interactive table reservations, and an admin management portal.

---

## 🎨 Visual & Functional Features

### 1. Homepage (`/`)
- **Sticky Glassmorphism Header**: Scrolled transition with glass blur backdrop, Hari Om branding logo, desktop navigation with animated underline bars, mobile drawer navigation with high-impact serif links, and "Call" / "Order now" actions.
- **Hero Banner Section**: High-resolution dish imagery (`images/hero.png`), saffron eyebrow tags, Cormorant Garamond typography, dual CTAs ("Explore our menu" & "Order +1 907-328-3218"), pulsing scroll indicator, and side rotated geographic tags.
- **Story Section (`#story`)**: Tandoor clay oven photography collage, fresh spices, golden samosas, and authentic story narrative detailing Fairbanks culinary heritage.
- **Culture Gallery**: Curated photography of The Shrine (Ganesh, flowers & Om mural), Booths & Lanterns, and Cushman Street exterior.
- **Chef's Signature Selection (`#selection`)**: Interactive auto-advancing carousel (Samosas, Lamb Rogan Josh, Shahi Paneer, Thali Platter) with hover pause, price badges, and order links.
- **Menu Preview Grid (`#menu-preview`)**: Horizontal category tabs bar, previewing the top dishes in each category with item counts and quick links to the full menu.
- **Experience Atmosphere (`#experience`)**: Copper warmth, snowy Fairbanks window ambience, and 3 service pillars (Dine In, Take Out, Catering).
- **Visit & Directions (`#visit`)**: Address details, interactive Google Maps card, directions button, and an interactive **Table Reservation Modal Dialog**.
- **Footer**: Brand tagline, quick navigation, category links, contact info, and copyright bar.

### 2. Interactive Digital Menu (`/menu`)
- **High-Performance SSR + Progressive Enhancement**: All 8 categories and 61 dishes are server-rendered for instant SEO indexing and accessibility, then progressively enhanced with Alpine.js.
- **Instant Search**: Real-time filtering across item names, descriptions, and ingredients with instant reset.
- **Dietary Filter Pills**: Quick toggle for Gluten Free (`GF`) and Vegetarian (`V`) dishes.
- **Sticky Category Bar**: Smooth scroll navigation with active section indicator.
- **Dashed-Row Item Layout**: Circular dish thumbnails with hover zoom, dietary badges (`GF`, `V`, `N`), and custom dashed-line price connections.
- **Multi-Dish Cards**: Dedicated list layout for Thali Platters with gold bullet points.
- **Floating "Our Menu" Drawer**: Bottom-right floating menu button opening a modal with jump links to all categories and "Back to top".

### 3. Admin Management Portal (`/admin`)
- **Secure Authentication**: Built-in authentication guarding the admin suite.
- **Dashboard Overview**: Key metrics (total items, categories, pending bookings, kitchen status).
- **Menu Items Manager (`/admin/menu`)**: Full CRUD for dishes, price management, descriptions, dietary tags, and sold-out/availability toggling.
- **Table Bookings Manager (`/admin/reservations`)**: View customer reservation requests, confirm bookings, and manage guests.
- **Settings Editor (`/admin/settings`)**: Update restaurant phone, hours, and address.

---

## 🛠️ Technology Stack

- **Backend**: Laravel 11.x, PHP 8.3+, Eloquent ORM, SQLite / MySQL support
- **Frontend**: Blade Templates, Bootstrap 5, Alpine.js, Vanilla JS
- **Build Tool**: Vite 8.x
- **Fonts**: Google Fonts (`Cormorant Garamond` & `Montserrat`)
- **Testing**: PHPUnit / Pest Feature Tests

---

## 🚀 Installation & Local Development

### 1. Prerequisites
- **PHP**: `8.3+` (with `pdo_sqlite` or `pdo_mysql`, `mbstring`, `curl`, `gd`, `openssl`)
- **Composer**: `2.x`
- **Node.js**: `18+` & `npm`

### 2. Setup Steps

```bash
# Clone or navigate to repository root
cd "e:/Hari OM Bites"

# 1. Install Composer dependencies
composer install

# 2. Setup environment configuration
cp .env.example .env
php artisan key:generate

# 3. Run database migrations & seed complete restaurant menu
php artisan migrate:fresh --seed

# 4. Install npm packages & compile frontend assets
npm install
npm run build

# 5. Start the development server
php artisan serve
```

The application will now be running at: **`http://127.0.0.1:8000`**

---

## 🔑 Default Admin Credentials

To access the restaurant management portal:
- **URL**: `http://127.0.0.1:8000/admin/login`
- **Email**: `admin@hariombites.com`
- **Password**: `password123`

---

## 🧪 Testing & Verification

Run the automated feature test suite to verify all routes, database operations, and authentication:

```bash
php artisan test
```

All 9 test suites pass with 72 assertions covering:
- Homepage rendering and copy verification
- Digital menu SSR and category listings
- Menu JSON API structure
- Customer table reservation submission and persistence
- Contact inquiries submission
- Guest redirect protection on admin routes
- Admin login and dashboard access

---

## 📁 Project Directory Structure

```
Hari OM Bites/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php      # Homepage, reservation & contact handlers
│   │   ├── MenuController.php      # Digital menu and JSON API
│   │   └── AdminController.php     # Admin dashboard, menu CRUD & bookings
│   └── Models/
│       ├── Category.php            # Menu categories
│       ├── MenuItem.php            # Dishes, prices, dietary tags & images
│       ├── Reservation.php         # Customer bookings
│       ├── ContactMessage.php      # Customer inquiries
│       └── Setting.php             # Restaurant configurations & hours
├── database/
│   ├── migrations/                 # Table definitions
│   └── seeders/
│       ├── DatabaseSeeder.php      # Main database seeder
│       └── RestaurantSeeder.php    # 8 categories & 61 authentic dishes
├── public/
│   └── images/                     # 28 authentic restaurant photos & branding
├── resources/
│   ├── css/app.css                 # Design tokens, typography & custom utilities
│   ├── js/app.js                   # Alpine.js initialization
│   └── views/
│       ├── layouts/app.blade.php   # Master frontend layout
│       ├── components/             # Reusable Blade components
│       │   ├── navbar.blade.php
│       │   ├── hero.blade.php
│       │   ├── story.blade.php
│       │   ├── culture-gallery.blade.php
│       │   ├── chef-selection.blade.php
│       │   ├── menu-preview.blade.php
│       │   ├── experience.blade.php
│       │   ├── visit.blade.php
│       │   └── footer.blade.php
│       ├── pages/
│       │   ├── home.blade.php      # Complete homepage
│       │   └── menu.blade.php      # Interactive digital menu
│       └── admin/                  # Admin portal views
├── routes/
│   └── web.php                     # Clean, semantic application routes
└── tests/
    └── Feature/HariOmWebsiteTest.php # Comprehensive test suite
```
