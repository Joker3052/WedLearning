<div class="container">
    <table style="width:100%;">
        <thead style="text-align:left;">
            <tr>
                <th>Id</th>
                <th>Ho Ten</th>
                <th>Dia chi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($data as $index => $arr) {
                echo "<tr>";
                foreach ($arr as $key => $value) {
                    echo "<td>{$value}</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
    
<a class="btn btn-outline-primary" href="./">Back</a>