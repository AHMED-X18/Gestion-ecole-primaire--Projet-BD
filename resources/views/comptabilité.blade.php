<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de la Comptabilité - Les Étoiles de l'Avenir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #2c3e50;
            position: fixed;
            padding-top: 20px;
            color: white;
        }
        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            color: white;
            display: block;
            font-size: 16px;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .sidebar a.active {
            background-color: #3498db;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .card-header {
            background-color: #3498db;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-body ul {
            list-style: none;
            padding: 0;
        }
        .card-body li {
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.2s;
        }
        .card-body li:hover {
            background-color: #e9ecef;
        }
        .card-body .badge {
            background-color: #3498db;
            color: white;
            padding: 5px 10px;
            border-radius: 10px;
        }
        .help-btn {
            background-color: #3498db;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }
        .help-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="index.html">Tableau de bord</a>
        <a href="#">Calendrier</a>
        <a href="#">Statistiques</a>
        <a href="#">Paramètres</a>
        <a href="#">Déconnexion</a>
    </div>
    <div class="content">
        <div class="header">
            <h2>Bienvenue, ATCHINE OUDAM</h2>
            <button class="help-btn">Centre d'aide</button>
        </div>
        <div class="card">
            <div class="card-header">
                <span>Gestion de la Comptabilité <i class="fas fa-money-bill-wave ml-2"></i></span>
                <span class="close-btn" style="cursor: pointer;">×</span>
            </div>
            <div class="card-body">
                <ul>
                    <li><span>Suivi des dépenses <i class="fas fa-chart-line ml-2"></i></span> <span class="badge">></span></li>
                    <li><span>Bilans financiers <i class="fas fa-file-invoice-dollar ml-2"></i></span> <span class="badge">></span></li>
                    <li><span>Gestion des salaires <i class="fas fa-wallet ml-2"></i></span> <span class="badge">></span></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
