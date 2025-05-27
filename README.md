# 🌐 AssociaSite

**AssociaSite** is a simple and customizable website designed to help **associations** easily manage their online presence.

---

## 🚧 Status  
🔄 In development

---

## ✨ Main Features

- 🎨 **Customizable Interface**  
  Adapt the site to your association’s needs without touching the code.

- 👥 **Member Management**  
  Add, edit, or delete members with just a few clicks.

- 📄 **Dynamic Pages**  
  Create and edit your pages directly from the interface.

- 🔐 **Secure Authentication**  
  Protect admin access with a login system.

---

## ⚙️ Installation

1. 📥 **Clone the repository**  
   git clone https://github.com/noepoirier/AssociaSite.git

2. 🛠️ **Configure the database**  
   - Create a MySQL database.  
   - Import the `schema.sql` file (to create if needed) to initialize the tables.

3. 📝 **Edit configuration**  
   - Enter your MySQL credentials in the PHP files (e.g., `Connexion.php`, etc.).

4. 🚀 **Deploy on a web server**  
   - Host the site on a PHP-enabled server (like Apache or Nginx with PHP).

---

## 👀 Usage Example

- 📂 Launch the site via `index.php` to display the homepage.  
- 🔑 Log in through `Connexion.php` to access the admin area.  
- 🧑‍💻 Manage your members and pages from `Gestion.php`.