<center>
<p align="center">
    <img src="img/white logo.png" style="height: 7ch;"><br>
    <h1>Scandiweb Junior Developer Test Task</h1>
    <h3>Available at: <a href="scandiweb-test-assignment.rf.gd/">scandiweb-test-assignment.rf.gd/</a></h3>
</p>
</center>

<hr>

<p align="center">
    <h2 align="center">Built with:</h2>
    <ul align="center">
        <li>PHP</li>
        <li>MySQL</li>
        <li>javascript</li>
        <li>jQuery</li>
        <li>Bootstrap</li>
        <li>Isotope</li>
    </ul>
</p>

<p align="center">
    <h2 align="center">Database structure:</h2>
    <table align="center">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Attributes</th>
        </tr>
        <tr>
            <td>SKU</td>
            <td>varchar(30)</td>
            <td>Unique</td>
        </tr>
        <tr>
            <td>NAME</td>
            <td>varchar(65)</td>
            <td>-</td>
        </tr>
        <tr>
            <td>PRICE</td>
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
</p>