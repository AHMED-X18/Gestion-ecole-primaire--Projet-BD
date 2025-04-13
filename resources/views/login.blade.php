<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CONNEXION</title>
  <link rel="stylesheet" href="{{ asset('css/page3.css') }}">
</head>
<body>
  <div class="container">
    <div class="left-panel">
      <h2>Welcome back!</h2>
      <p>Tu peux te connecter a ton compte si tu l'as deja creer!.</p>
    </div>
    <div class="right-panel">
      <h2>Sign In</h2>
      <form>
        <div class="input-group">
          <input type="email" placeholder="Username or email" required />
        </div>
        <div class="input-group">
          <input type="password" placeholder="Password" required />
        </div>
        <div class="options">
          <label><input type="checkbox" /> Remember me</label>
          <a href="#">Mot de passe oublie ?</a>
        </div>
        <button class="login-btn" type="submit">Sign In</button>
      </form>
      <div class="signup-link">
        Nouveau ici? <a href="#">Cree un nouveau compte!!!!!</a>
      </div>
    </div>
  </div>
</body>
</html>
