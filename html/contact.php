<?php if (!isset($_SESSION)) {session_start();} ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description"
          content="Contacter la chatterie Hairlessness pour en savoir plus sur les chatons à vendre">
    <meta name="keywords"
          content="Hairlessness,Chatterie,Sphinx,Contact,Chatons">
    <title>Contacter nous - Hairlessness</title>
    <link href="../styles.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon.png">
</head>
<body>
    <header class="header">
        <h1 class="header__title">Hairlessness</h1>
            <a class="header__link" href="../index.html" title="Aller sur la page d'accueil"><img class="header__logo" src="../assets/logo.svg" alt="Logo de Hairlessness"></a>
            <div class="burger-menu">
                <input class="burger-menu__checkbox" type="checkbox" />
                <span class="burger-menu__span"></span>
                <span class="burger-menu__span"></span>
                <span class="burger-menu__span"></span>
                <nav class="nav">
                    <h2 class="nav__title">Navigation du site</h2>
                    <a class="nav__link" href="../index.html" title="Aller sur la page d'accueil">Accueil</a>
                    <a class="nav__link" href="./cats.html" title="Aller sur la page des chatons">Nos chatons</a>
                    <a class="nav__link" href="./etalons.html" title="Aller sur la page des étalons">Etalons</a>
                    <a class="nav__link" href="./femelles.html" title="Aller sur la page des femelles">Femelles</a>
                    <a class="nav__link" href="./galerie.html" title="Aller sur la page de la galerie">Galerie</a>
                    <a class="nav__link" href="./historique.html" title="Aller sur la page de l'histoire">Histoire</a>
                    <a class="nav__link" href="./livre.html" title="Aller sur la page du livre d'or">Livre d'or</a>
                    <a class="nav__link nav__link--active" href="./contact.php" title="Aller sur la page de contact">Contact</a>
                </nav>
            </div>
    </header>
    <main class="main">
        <section class="contact">
            <div class="wrapper">
                <h2 class="title">Formulaire de contact</h2>
                <?php if(isset($_SESSION['form'])): ?>
                <p class="feedback"><?php echo $_SESSION['form'] ?></p>
                <?php unset($_SESSION['form']); ?>
                <?php endif; ?>
                <form class="form withoutJavascript" action="../form.php" method="post" id="contactForm">
                    <div class="block">
                        <label class="form__label" for="nom">Votre nom</label>
                        <input class="form__input" name="nom" id="nom" aria-required="true" aria-invalid="false" placeholder="Votre nom (requis)" type="text" required>
                    </div>
                    <div class="block">
                        <label class="form__label" for="email">Votre adresse email</label>
                        <input class="form__input" name="email" id="email" aria-required="true" aria-invalid="false" placeholder="Votre adresse email (requis)" type="email" required>
                    </div>
                    <div class="block">
                        <label class="form__label" for="mobile">Votre numéro de téléphone</label>
                        <input class="form__input" name="mobile" id="mobile" aria-required="true" aria-invalid="false" placeholder="Votre numéro de téléphone" type="tel">
                    </div>
                    <div class="block block--large">
                        <label class="form__label" for="message">Votre message</label>
                        <textarea class="form__textarea" name="message" id="message" aria-required="true" aria-invalid="false" placeholder="Votre message (requis)" required></textarea>
                    </div>
                    <p class="form__error" id="error"></p>
                    <input class="form__submit" type="button" id="contactButton" name="envoi" value="Envoyer">
                </form>
            </div>
        </section>
    </main>
    <footer class="footer withoutJavascript">
        <div class="wrapper">
            <div class="container">
                <div class="block">
                    <img class="block__image" src="../assets/cat.svg">
                    <h3 class="block__title">Nos chatons</h3>
                    <a class="block__link" href="./cats.html" title="Aller sur la page des chatons à vendre">Voir nos chatons à vendre</a>
                </div>
                <div class="block">
                    <img class="block__image" src="../assets/facebook.svg">
                    <h3 class="block__title">Notre facebook</h3>
                    <a class="block__link" href="#" title="Aller sur la page facebook de Hairlessness">Vers notre page facebook</a>
                </div>
                <div class="block">
                    <img class="block__image" src="../assets/contact.svg">
                    <h3 class="block__title">Contact</h3>
                    <p class="block__text">Numéro: <a class="block__link block__link--number" href="tel:+485937556" title="Un numéro pour nous contacter">+485 93 75 56</a></p>
                </div>
            </div>
            <img class="footer__logo" src="../assets/logo.svg" alt="Logo de Hairlessness">
            <p class="footer__text">Copyright 2019 - Hairlessness - All right reserved</p>
        </div>
    </footer>
<script src="../main.js" type="text/javascript"></script>
</body>
</html>