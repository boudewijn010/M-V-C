<?php
class HomepageView
{
    public static function render()
    {
        require_once("header.php");
        ?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Shoporia</title>
            <link rel="stylesheet" type="text/css" href="../styles/styles.css">
        </head>

        <body>

            <main>
                <h1>Welkom bij Shoporia!</h1>
                <p>Dé plek voor al je online aankopen. Ontdek ons ruime assortiment en profiteer van scherpe prijzen.</p>

                <section class="features">
                    <h2>Waarom Shoporia?</h2>
                    <ul>
                        <li>✔️ Groot aanbod producten</li>
                        <li>✔️ Snelle levering</li>
                        <li>✔️ Veilig betalen</li>
                        <li>✔️ Uitstekende klantenservice</li>
                    </ul>
                </section>
                <?php
                require_once("footer.php");
                ?>
            </main>
        </body>

        </html>
        <?php
    }
}


?>