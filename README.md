# 🌿 IVY Plant Shop

IVY Plant Shop is an online shop where users can browse, add, and purchase plants.  
An **admin account** is included in the database to manage the shop by **adding, deleting, and modifying** plant listings.

---

## ✨ Features

- 🌱 Browse all plants available in the shop  
- 🛒 Add plants to your cart and make purchases  
- 📄 View detailed information about each plant  
- 👩‍💼 Admin account with full management capabilities:  
  - ➕ Add new plants  
  - ✏️ Edit plant details  
  - ❌ Delete plants  

---

## 📸 Screenshots

<img width="921" height="470" alt="home" src="https://github.com/user-attachments/assets/1323f0d4-d26a-4c3d-90ba-1452ac11e6e3" />

<img width="921" height="470" alt="shop" src="https://github.com/user-attachments/assets/7c5e4ec4-2d51-481c-bfcd-bc8ac2d4512b" />

<img width="921" height="470" alt="about page" src="https://github.com/user-attachments/assets/832f5a8d-f7af-4fd2-b02c-570fdaa83187" />

<img width="924" height="543" alt="contactus" src="https://github.com/user-attachments/assets/f123e3a6-3458-41eb-902f-97e681ef902a" />

<img width="851" height="465" alt="adminlogin" src="https://github.com/user-attachments/assets/e128fde2-ddcc-4b21-b77d-7686947bcb5a" />


<img width="851" height="488" alt="welcomeadmin" src="https://github.com/user-attachments/assets/612a3d21-8327-43b7-b9c8-dd7f76e23d64" />

<img width="802" height="467" alt="adminadd" src="https://github.com/user-attachments/assets/59be629c-6526-4ca0-a6ce-4b2378e193d6" />

<img width="798" height="496" alt="admindeleteitem" src="https://github.com/user-attachments/assets/49d50234-bef6-4880-a745-3ffa9f697284" />

<img width="798" height="477" alt="aadmin_modify" src="https://github.com/user-attachments/assets/4e486c78-aeca-46a5-b2c9-cfd0ff2312e3" />

<img width="930" height="439" alt="FAQ" src="https://github.com/user-attachments/assets/6ec6cc1c-5dea-45f2-be0c-e77a719af5b6" />

<img width="926" height="473" alt="cart" src="https://github.com/user-attachments/assets/c466f827-7534-4b6a-be63-c27ea68b440a" />
<img width="909" height="537" alt="orderpayment carttotal" src="https://github.com/user-attachments/assets/7afc3ab0-6d74-4868-8f89-ae61efe7c25e" />
<img width="909" height="455" alt="thank_you_forurorder" src="https://github.com/user-attachments/assets/7a2c1744-fcca-454e-8cf1-aa1a23e18866" />

---

## ⚙️ Installation

To run IVY Plant Shop on your local machine:

1. 🖥️ **Install a local web server**:  
   - Recommended: [XAMPP](https://www.apachefriends.org/) or [WAMP](https://www.wampserver.com/).

2. 📂 **Place the project files**:  
   - Copy all project files (PHP, HTML, CSS, SQL) into the `htdocs` folder (for XAMPP) or the equivalent folder in your server setup.

3. 🗄️ **Create the database**:  
   - Open **phpMyAdmin** from your web server.  
   - Create a new database (e.g., `ivy_plant_shop`).  
   - Import the `plants.sql` or `plants33.sql` file to create tables and seed data.

4. 🔗 **Update database connection**:  
   - Open `mysqli_connect.php` and update the database credentials if necessary:
   ```php
   $servername = "localhost";
   $username = "root";   // default for XAMPP/WAMP
   $password = "";       // default for XAMPP/WAMP
   $dbname = "ivy_plant_shop"; // your database name
