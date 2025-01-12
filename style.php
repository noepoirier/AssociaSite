<?php
include('menu.php');
include('db_config.php');

$association_id = isset($_GET['association_id']) ? intval($_GET['association_id']) : 0;

if ($association_id === 0) {
    $page_color = "white";
    $bg_color = "royalblue";
} else {
    $stmt_get_colors = $connection->prepare("SELECT page_color, background_color FROM Associations WHERE association_id = ?");
    $stmt_get_colors->bind_param("i", $association_id);
    $stmt_get_colors->execute();
    $result = $stmt_get_colors->get_result();
    $row = $result->fetch_assoc();
    $page_color = $row['page_color'];
    $bg_color = $row['background_color'];
    $stmt_get_colors->close();
    $connection->close();
}

header("Content-type: text/css"); // Déclare que ce fichier retourne du CSS
?>

:root {
    --page_color: <?php echo $page_color; ?>;
    --bg_color: <?php echo $bg_color; ?>;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--bg_color);
    padding: 0;
    margin: 0;
}

.menu_site {
    background-color: var(--page_color);
    box-shadow: 0 0.25vh 0.45vh rgba(0, 0, 0, 0.5); /* Ombre portée légère */
    width: 100%;
    margin: 0;
    margin-bottom: 2vh;
    display: flex; /* Transformer l'élément en conteneur flex */
    justify-content: center; /* Centrer les éléments horizontalement */
    align-items: center; /* Centrer les éléments verticalement */
    
    ul {
        display: flex; /* Transformer l'élément en conteneur flex */
        align-items: center;
        list-style: none; /* Suppression des puces de liste */
    }

    li {
        display: inline-block; /* Affichage en ligne et bloc */
        margin-right: 2vh; /* Marge à droite pour espacer les éléments */
    }

    a {
        text-decoration: none; /* Suppression du soulignement par défaut */
        color: #333;
        font-weight: bold;
        transition: color 0.3s ease-in-out; /* Transition de couleur au survol */
    }

    a:hover, a:active {
        color: var(--bg_color); /* Nouvelle couleur du texte au survol */
    }

    .separation_menu {
        width: 0.35vh; /* Largeur de la séparation */
        height: 3vh; /* Hauteur de la séparation */
        border-radius: 4.5vh;
        background-color: var(--bg_color); /* Couleur de la séparation */
        display: inline-block; /* Pour s'assurer qu'elle est affichée en ligne avec les autres éléments du menu */
        margin-right: 2vh;
    }
}

.active::after {
    content: "\2022"; /* Utilisation du caractère Unicode pour représenter un point */
    display: block; /* Affichage en tant que bloc pour être placé après le lien */
    color: var(--bg_color);
    text-align: center;
    transition: color 0.3s ease-in-out, opacity 0.3s ease-in-out; /* opacity à la transition pour animer l'apparition du point */
    opacity: 1; /* opacity à 1 pour que le point soit visible */
}

.logo {
    width: 20vh;
    border-radius: 4.5vh;
    margin-bottom: 3vh;
}

.name_rectangle {
    display: flex;
    width: fit-content;
    justify-content: center;
    padding: 0 2vh;
    border: 0.75vh solid var(--page_color);
    background-color: transparent;
    margin: 0 auto;
    border-radius: 4.5vh;
    font-size: 1.3em;
    margin-bottom: 2.5vh;
}

.gestion_name {
    display: flex; /* Transformer l'élément en conteneur flex */
    justify-content: center;
    align-items: center;
    margin-bottom: 2.5vh;

    img {
        object-fit: contain;
        width: 10vh;
        margin-right: 4vh;
        border-radius: 4.5vh;
    }
}

.separation_rectangle {
    margin: 0 auto;
    width: 150vh;
    height: 2.5vh;
    border-radius: 4.5vh;
    background-color: var(--page_color);
    clear: both; /* L'élément doit être placé sous les éléments flottants */
    margin-top: 5vh;
    margin-bottom: 5vh;
}

.content_rectangle {
    background-color: var(--page_color);
    position: relative;
    padding: 3vh;
    text-align: center;
    
    h2 {
        width: 100%;
        margin-bottom: 7vh;
    }

    .content {
        position: relative;
        width: 100%;
        height: 100%;
        justify-content: center;
        
        .formulaire {
            form {
                input[type="text"], input[type="password"] {
                    margin-bottom: 2vh;
                }
            }

            .gestion_form {
                display: flex;
                justify-content: space-around;
                align-items: center;

                .set_logo, .set_slogan, .set_color, .set_pages {
                    background-color: var(--page_color);
                    padding: 2vh;
                    border: 0.15vh solid #0000002f;
                    border-radius: 1vh;
                    margin-bottom: 5vh;
                    justify-content: center;
                    width: fit-content;
                    height: fit-content;
                }
        
                .set_logo {
                    .logo_upload {
                        background: linear-gradient(145deg, #ffffff, #e6e6e6); /* Dégradé subtil */
                        color: #000; /* Couleur du texte */
                        border: none; /* Pas de bordure */
                        border-radius: 0.85vh; /* Bordures légèrement arrondies */
                        padding: 1vh 2vh; /* Padding pour le bouton */
                        font-size: 1em; /* Taille du texte */
                        font-weight: bold;
                        cursor: pointer;
                        box-shadow: 0 0.45vh 0.65vh rgba(0, 0, 0, 0.1); /* Ombre externe légère */
                        transition: all 0.3s ease; /* Transition douce pour les changements */
                        outline: none; /* Supprime la bordure bleue lors du clic */
                    }
            
                    .logo_upload:hover {
                        background: linear-gradient(145deg, #e6e6e6, #ffffff); /* Dégradé inversé lors du survol */
                        box-shadow: 0 0.65vh 0.85vh rgba(0, 0, 0, 0.15); /* Augmente légèrement l'ombre externe au survol */
                    }
            
                    .logo_upload:active {
                        background: linear-gradient(145deg, #dcdcdc, #ffffff); /* Couleur de fond lors du clic */
                        box-shadow: 0 0.45vh 0.65vh rgba(0, 0, 0, 0.1); /* Réduit l'ombre externe lors du clic */
                        transform: translateY(0.25vh); /* Légère translation vers le bas pour l'effet de clic */
                    }
                }
        
                .set_color {
                    label {
                        font-weight: bold;
                    }
    
                    select {
                        background: linear-gradient(145deg, #ffffff, #e6e6e6); /* Dégradé subtil */
                        color: #000; /* Couleur du texte */
                        border: none; /* Pas de bordure */
                        border-radius: 0.85vh; /* Bordures légèrement arrondies */
                        padding: 1vh 1.5vh; /* Padding pour le bouton */
                        font-size: 1em; /* Taille du texte */
                        cursor: pointer;
                        box-shadow: 0 0.45vh 0.65vh rgba(0, 0, 0, 0.1); /* Ombre externe légère */
                        transition: all 0.3s ease; /* Transition douce pour les changements */
                        outline: none; /* Supprime la bordure bleue lors du clic */
                        margin-bottom: 2vh;
                    }
            
                    select:hover {
                        background: linear-gradient(145deg, #e6e6e6, #ffffff); /* Dégradé inversé lors du survol */
                        box-shadow: 0 0.65vh 0.85vh rgba(0, 0, 0, 0.15); /* Augmente légèrement l'ombre externe au survol */
                    }
                }
    
                .set_pages {
                    .bouton {
                        margin-bottom: 2vh;
                    }
                }
            }
        }
    }
}

.content_rectangle::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: var(--bg_color);
    opacity: 0.1;
}
        
input[type="file"] {
    display: none;
}

input[type="text"], input[type="password"], input[type="number"] {
    background: linear-gradient(145deg, #ffffff, #e6e6e6); /* Dégradé subtil */
    color: #000; /* Couleur du texte */
    border: none; /* Pas de bordure */
    border-radius: 0.85vh; /* Bordures légèrement arrondies */
    padding: 0.85vh 1.25vh; /* Réduire le padding pour les champs de formulaire */
    font-size: 1em; /* Taille de la police plus petite */
    cursor: pointer;
    box-shadow: 0 0.45vh 0.65vh rgba(0, 0, 0, 0.1); /* Ombre externe légère */
    transition: all 0.3s ease; /* Transition douce pour les changements */
    outline: none; /* Supprime la bordure bleue lors du clic */
}

input[type="text"]:hover, input[type="password"]:hover, input[type="number"]:hover {
    background: linear-gradient(145deg, #e6e6e6, #ffffff); /* Dégradé inversé lors du survol */
    box-shadow: 0 0.65vh 0.85vh rgba(0, 0, 0, 0.15); /* Augmente légèrement l'ombre externe au survol */
}

input[type="text"]:active, input[type="password"]:active, input[type="number"]:active {
    background: linear-gradient(145deg, #dcdcdc, #ffffff); /* Couleur de fond lors du clic */
    box-shadow: 0 0.45vh 0.65vh rgba(0, 0, 0, 0.1); /* Réduit l'ombre externe lors du clic */
    transform: translateY(0.25vh); /* Légère translation vers le bas pour l'effet de clic */
}

.bouton {
    background: linear-gradient(145deg, #ffffff, #e6e6e6); /* Dégradé subtil */
    color: #000; /* Couleur du texte */
    border: none; /* Pas de bordure */
    border-radius: 0.85vh; /* Bordures légèrement arrondies */
    padding: 1vh 2vh; /* Padding pour le bouton */
    font-size: 1em; /* Taille du texte */
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 0.45vh 0.65vh rgba(0, 0, 0, 0.1); /* Ombre externe légère */
    transition: all 0.3s ease; /* Transition douce pour les changements */
    outline: none; /* Supprime la bordure bleue lors du clic */
}

.bouton:hover {
    background: linear-gradient(145deg, #e6e6e6, #ffffff); /* Dégradé inversé lors du survol */
    box-shadow: 0 0.65vh 0.85vh rgba(0, 0, 0, 0.15); /* Augmente légèrement l'ombre externe au survol */
}

.bouton:active {
    background: linear-gradient(145deg, #dcdcdc, #ffffff); /* Couleur de fond lors du clic */
    box-shadow: 0 0.45vh 0.65vh rgba(0, 0, 0, 0.1); /* Réduit l'ombre externe lors du clic */
    transform: translateY(0.25vh); /* Légère translation vers le bas pour l'effet de clic */
}