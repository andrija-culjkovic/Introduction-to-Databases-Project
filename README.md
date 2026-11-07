# 🚗 Introduction to Databases Project – Car Tuning Parts Web Shop

A database-driven web shop for car tuning parts, built with **PHP** and **MySQL** for the *Introduction to Databases* course. Visitors can browse a product catalog, search and filter products, add items to a shopping cart and contact the shop.

The website content is written in **Serbian**.

---

## ✨ Features

- **Product catalog** – products loaded from a MySQL database, with images
- **Search** – find products by name
- **Filtering** – narrow down the catalog by category
- **Shopping cart** – add, view and manage items in the cart
- **Contact page** – form for getting in touch with the shop
- **Database model** – included MySQL Workbench model and SQL scripts
- **Product images** – exhausts, turbo kits, wheels, brakes, suspension, cooling, seats, steering wheels, body kits and more

## 🛠️ Technologies

| Technology | Used for |
|------------|----------|
| PHP | Server-side logic, pages and cart handling |
| MySQL / MariaDB | Product and shop data |
| HTML5 + CSS3 | Page structure and styling |
| MySQL Workbench | Database modeling (`ModelBaze.mwb`) |

## 📁 Project Structure

```
Introduction-to-Databases-Project/
├── index.php             # Home page
├── katalog.php           # Product catalog
├── pretraga.php          # Product search
├── filter.php            # Catalog filtering
├── korpa.php             # Shopping cart page
├── Handlekorpa.php       # Cart logic
├── kontakt.php           # Contact page
├── ucitaj_modele.php     # Loads models from the database
├── konekcija.php         # Database connection settings
├── style.css             # Styling
├── SQLkod.sql            # Database structure
├── InsertBaze.sql        # Sample data
├── SQLkodSaInsertom.sql  # Structure + sample data in one file
├── ModelBaze.mwb         # MySQL Workbench database model
├── UPUTSTVO ZA PROJEKAT.txt
└── slike/                # Product images, logo and hero image
```

## 🚀 Getting Started

### Requirements

A local server with PHP and MySQL, for example [XAMPP](https://www.apachefriends.org/), WAMP or Laragon.

### Installation

1. Clone the repository into your server's web folder (`htdocs` for XAMPP):
   ```bash
   git clone https://github.com/andrija-culjkovic/Introduction-to-Databases-Project.git
   ```
2. Start **Apache** and **MySQL** from the XAMPP control panel.
3. Open **phpMyAdmin** at `http://localhost/phpmyadmin`.
4. Create a new database and import `SQLkodSaInsertom.sql` (or import `SQLkod.sql` first and then `InsertBaze.sql`).
5. Open `konekcija.php` and set your MySQL host, username, password and database name.
6. Open the website in your browser:
   ```
   http://localhost/Introduction-to-Databases-Project/
   ```

## 🗄️ Database

The database structure is described in `ModelBaze.mwb` (open it with MySQL Workbench). The SQL scripts create the tables and fill them with sample products.

## ⚠️ Notes

- Do not commit real database passwords. The default local XAMPP settings are fine for development.
- Product images are used for demonstration only and belong to their respective owners.

## 👤 Author

**Andrija Čuljković**
GitHub: [@andrija-culjkovic](https://github.com/andrija-culjkovic)

## 📜 License

This project was made for educational purposes.
