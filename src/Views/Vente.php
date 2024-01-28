<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vente</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/annonce.css">
    <script src="https://kit.fontawesome.com/1d87cf05c5.js" crossorigin="anonymous"></script>
    <script src="../js/script.js" defer></script>
</head>
<body>

<div class="navbar">
    <div class="left">
        <div class="logo">
            <img src="../img/logo.jpg" class="logo" alt="logo">
        </div>
        <div class="title">
            <h1>Amical'Troc</h1>
        </div>
    </div>
    <div class="menu">
        <a href="../../index.html">Accueil</a>
        <a href="#" class="current">Vente</a>
        <a href="Troc.html">Troc</a>
        <a href="Location.html">Location</a>
    </div>
    <div class="search-navbar">
        <input type="text" name="navbar-search" id="navbar-search" placeholder="Rechercher">
        <button type="submit" class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>

</div>

<div class="container">
    <div class="annonce">
        <div class="annonce-image">
            <img src="../img/voiture.jpg" alt="Annonce 1">
        </div>
        <div class="annonce-info">
            <div class="annonce-header">
                <h2>Annonce 1</h2>
                <div class="annonce-prix">
                    <span class="prix-label">Prix :</span>
                    <span class="prix-valeur">5000 €</span>
                </div>
                <div>
                    <button class="btn-delete">supprimer l'annonce <i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
            <div class="annonce-details">
                <p><strong>Marque :</strong> Exemple </p>
                <p><strong>mise en vente le :</strong> 11/05/2023</p>
                <p><strong>Mail de contact :</strong> exemple@mail.fr</p>
                <p><strong>numero de contact : </strong> 0780743349</p>
            </div>
            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid assumenda cupiditate dolore est explicabo fuga iure maiores nostrum placeat, quo veniam veritatis voluptates? Alias consectetur eveniet odio quisquam quo?</span><span>Assumenda blanditiis debitis dignissimos eos et, ex exercitationem impedit ipsa modi necessitatibus, nobis quisquam repellendus, rerum sapiente vel. Beatae cumque dolor ipsam similique vel! Consectetur corporis culpa dolorum iusto odit!</span></p>

        </div>
    </div>
</div>

<footer class="footer-distributed">

    <div class="footer-left">

        <div class="left">
            <div class="logo">
                <img src="../img/logo.jpg" class="logo" alt="logo">
            </div>
            <div class="title">
                <h1>Amical'Troc</h1>
            </div>
        </div>

        <p class="footer-links">
            <a href="#" class="link-1">Home</a>

            <a href="#">Blog</a>

            <a href="#">Pricing</a>

            <a href="#">About</a>

            <a href="#">Faq</a>

            <a href="#">Contact</a>
        </p>

        <p class="footer-company-name">Amical'Troc © 2023</p>
    </div>

    <div class="footer-center">

        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>AVENUE DE L' HÔPITAL</span> 12027 RODEZ CEDEX 9</p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>05 65 55 12 12</p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:support@company.com">support@company.com</a></p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>Amical'Troc</span>
            Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
        </p>

        <div class="footer-icons">

            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>

        </div>

    </div>

</footer>

</body>
</html>