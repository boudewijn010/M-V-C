<?php
class aboutusView
{
    public static function render($error = '')
    {
        ?>
        <!DOCTYPE html>
        <html lang="nl">
        <head>
            <meta charset="UTF-8">
            <title>About Us</title>
            <link rel="stylesheet" type="text/css" href="/M-V-C/styles/styles.css">
        </head>
        <body>
            <?php
            require_once __DIR__ . '/header.php';
            HeaderView::render();
            ?>
            <main style="max-width: 700px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.07);">
                <main
                        style="max-width: 700px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.07);">
                    <h1>Het Verhaal van Shoporia</h1>
                    <p>
                        Shoporia begon niet als een bedrijfsidee, maar als een gedeelde droom van twee vrienden: <strong>Boudewijn
                            Damme</strong> en <strong>Indy Brinkman</strong>. Vanuit hun gedeelde passie voor innovatie, stijl en
                        slim design vroegen ze zich af waarom online winkelen vaak zo onpersoonlijk en saai was. Samen wilden ze
                        daar verandering in brengen.
                    </p>
                    <p>
                        Tijdens vele late avonden vol koffie, ideeën en eindeloze gesprekken ontstond het concept van Shoporia – een
                        plek waar shoppen niet alleen snel en makkelijk is, maar ook leuk, verrassend en betrouwbaar. De naam
                        “Shoporia” is een mix van “shoppen” en het gevoel van “euforie” dat je krijgt wanneer je echt iets goeds
                        vindt. Want dat is waar Boudewijn en Indy naar streefden: een winkelervaring die een glimlach op je gezicht
                        tovert.
                    </p>
                    <p>
                        Wat begon met een klein assortiment en een zelfgebouwde website, groeide snel dankzij hun toewijding aan
                        kwaliteit, klantenservice en een scherpe neus voor unieke producten. Ze kozen bewust voor een aanbod dat nét
                        even anders is – slim, stijlvol en met zorg uitgekozen.
                    </p>
                    <p>
                        Vandaag is Shoporia een snelgroeiende webshop met een hart. Boudewijn en Indy staan nog steeds zelf aan het
                        roer, met als missie om elke klant het gevoel te geven dat ze iets bijzonders gevonden hebben.
                    </p>
                    <p>
                        <strong>Welkom bij Shoporia – waar shoppen weer een beleving wordt.</strong>
                    </p>
            </main>
            <?php require_once("footer.php"); ?>
        </body>
        </html>
        <?php
    }
}

