<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="lpcss.css">
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Diseño</h2>
            </div>
        </div>
        <div class="gallery">
            <?php
                echo '<div class="photo">';
                echo '<img src="hr.png" alt="Photo 1">';
                echo '<a href="padilla_dis_hrd_index.html">Human Resources</a>';
                echo '</div>';

                echo '<div class="photo">';
                echo '<img src="marketing.png" alt="Photo 2">';
                echo '<a href="paciente_dis_mkt_login.html">Marketing</a>';
                echo '</div>';

                echo '<div class="photo">';
                echo '<img src="Inventory.jpg" alt="Photo 3">';
                echo '<a href="hilis_dis_scm_index.html">Inventory</a>';
                echo '</div>';

                echo '<div class="photo">';
                echo '<img src="accountings.jpg" alt="Photo 4">';
                echo '<a href="sanguir_dis_act_login.html">Accounting</a>';
                echo '</div>';

                echo '<div class="photo">';
                echo '<img src="payroll.png" alt="Photo 5">';
                echo '<a href="deasis_mercado_dis_pyr_login.html">Payroll</a>';
                echo '</div>';
            ?>
        </div>
    </div>
</body>
</html>
