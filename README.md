<center>
    <p align="center">
        <img src="resources/images/white logo.png" style="height: 7ch;"><br>
        <h1 align="center">Scandiweb Junior Developer Test Task</h1>
        <h4 align="center">Available at: <a href="scandiweb-test-assignment.rf.gd/">scandiweb-test-assignment.rf.gd/</a></h4>
    </p>
</center>

<hr>

<p align="center">
    <h2 align="center">How to use:</h2>
    <ol align="center">
        <li align="center">On  the <i>.htaccess</i> file, replace your deployment directory on <i>RewriteBase</i></li>
        <ul>
            <li>For example: if you're deploying at <i>https://localhost/myapp/</i>, <i>RewriteBase</i> must be <i>/myapp/</i></li>
            <li>Else if you're deploying simply at <i>https://localhost/</i>, <i>RewriteBase</i> must be <i>/</i></li>
        </ul>
        <li align="center">On  the <i>/app/models/Database.php</i> file, replace the <i>HOST</i>, <i>USER</i>, <i>PASSWORD</i> and <i>DBNAME</i> constants with your relevant SQL information.</li>
    </ol>
</p>

<p align="center">
    <h2 align="center">Built with:</h2>
    <center>
        <ul align="center">
            <li align="center">PHP</li>
            <li align="center">MySQL</li>
            <li align="center">javascript</li>
            <li align="center">jQuery</li>
            <li align="center">Bootstrap</li>
            <li align="center">Isotope</li>
        </ul>
    </center>
</p>

<hr>

<p align="center">
    <h2 align="center">Database structure:</h2>
    <center>
    <table align="center">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Attributes</th>
        </tr>
        <tr>
            <td>SKU</td>
            <td>varchar(30)</td>
            <td>Primary</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>varchar(65)</td>
            <td>-</td>
        </tr>
        <tr>
            <td>Price</td>
            <td>decimal(10,0)</td>
            <td>-</td>
        </tr>
        <tr>
            <td>productType</td>
            <td>enum('Book', 'Furniture', 'DVD')</td>
            <td>-</td>
        </tr>
        <tr>
            <td>productAttribute</td>
            <td>varchar(12)</td>
            <td>-</td>
        </tr>
    </table>
    </center>
</p>
<br>
<h2 align="center">File structure:</h2>

    
    📦root
    ┣ 📂app
    ┃ ┗ 📂models
    ┃ ┃ ┣ 📜Book.php
    ┃ ┃ ┣ 📜Database.php
    ┃ ┃ ┣ 📜DVD.php
    ┃ ┃ ┣ 📜Furniture.php
    ┃ ┃ ┗ 📜Product.php
    ┣ 📂resources
    ┃ ┣ 📂css
    ┃ ┃ ┗ 📜main.css
    ┃ ┣ 📂images
    ┃ ┃ ┣ 🖼️2015-11-09_scandiweb_logo.png
    ┃ ┃ ┣ 🖼️demo.gif
    ┃ ┃ ┣ 🖼️edit_black_24dp.svg
    ┃ ┃ ┣ 🖼️favico.ico
    ┃ ┃ ┣ 🖼️github.png
    ┃ ┃ ┣ 🖼️QA.png
    ┃ ┃ ┗ 🖼️white logo.png
    ┃ ┣ 📂js
    ┃ ┃ ┗ 📜main.js
    ┃ ┗ 📂views
    ┃ ┃ ┣ 📂partials
    ┃ ┃ ┃ ┣ 📜footer.php
    ┃ ┃ ┃ ┗ 📜head.php
    ┃ ┃ ┣ 📜add-product.php
    ┃ ┃ ┣ 📜add.php
    ┃ ┃ ┣ 📜delete.php
    ┃ ┃ ┣ 📜edit-product.php
    ┃ ┃ ┗ 📜edit.php
    ┣ 📂vendor
    ┃ ┣ 📂composer
    ┃ ┃ ┣ 📜autoload_classmap.php
    ┃ ┃ ┣ 📜autoload_namespaces.php
    ┃ ┃ ┣ 📜autoload_psr4.php
    ┃ ┃ ┣ 📜autoload_real.php
    ┃ ┃ ┣ 📜autoload_static.php
    ┃ ┃ ┣ 📜ClassLoader.php
    ┃ ┃ ┗ 📝LICENSE
    ┃ ┗ 📜autoload.php
    ┣ 📋.htaccess
    ┣ 📝LICENSE
    ┣ 📑composer.json
    ┗ 📜index.php

<hr>

<center>
    <p align="center">
        <h3 align="center">Demonstration</h3>
            <img src="resources/images/demo.gif" style="height: 50ch"><br><br>
        <h3 align="center">AutoQA approval</h3>
            <img src="resources/images/QA.png" style="height: 50ch;">
    </p>
</center>

<hr>

<center>
    <p align="center">
        <small align="center">&copy; 2022 Gabriel Tkacz</small>
    </p>
</center>