<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CONNEXION</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <div class="container">
    <div class="left-panel">
      <h2>Bienvenue !</h2>
      <p>Connectez-vous à votre compte existant.</p>
    </div>
    <div class="right-panel">
      <h2>Connexion</h2>

      <form method="POST" action="{{ route('login.user') }}">
        @csrf

        <div class="input-group">
          <input id="email" type="email" class="@error('email') is-invalid @enderror"
                 name="email" value="{{ old('email') }}"
                 placeholder="Adresse email" required autocomplete="email" autofocus>

          @error('email')
            <span class="error-message" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="input-group">
          <input id="password" type="password" class="@error('password') is-invalid @enderror"
                 name="password" placeholder="Mot de passe"
                 required autocomplete="current-password">

          @error('password')
            <span class="error-message" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="options">
          <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            Se souvenir de moi
          </label>
          <a >Mot de passe oublié ?</a>
        </div>

        <button type="submit" class="login-btn" >Se connecter</button>
      </form>

      <div class="signup-link">
        Nouveau ici? <a href="{{ route('inscription') }}">Créer un compte</a>
      </div>
    </div>
  </div>
</body>
</html>
