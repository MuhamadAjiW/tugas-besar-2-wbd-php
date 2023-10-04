<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta
      name="viewport"
      content="height=device-height,width=device-width,initial-scale=1.0,maximum-scale=1.0,viewport-fit=cover"
    />
    <title>Login</title>
    <!--Fonts Pake Poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,700&display=swap"
      rel="stylesheet"
    />
    <!--Feather Icons-->
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="/public/css/style.css" />
  </head>

  <body>
    <section>
      <div class="book">
        <img
          src="https://www.goodnewsfromindonesia.id/uploads/post/large-1280px-books-hd-8314929977-7bb081dd3c63bc7677a06531bc56de94.jpg"
          alt="Gambar buku"
          width="250"
          height="250"
        />
      </div>
      <div class="form-box">
        <div class="form-value">
          <form action="/login" method="post">
            <h2>Welcome back <i data-feather="smile"></i></h2>
            <div class="p">Login with your Redsy account</div>
            <div class="inputbox">
              <i data-feather="mail"></i>
              <input
                type="email"
                id="email"
                name="email"
                required
                placeholder="     Masukkan email"
              />
            </div>
            <div class="inputbox">
              <i data-feather="lock"></i>
              <input
                type="password"
                id="password"
                name="password"
                required
                placeholder="     Masukkan password"
              />
            </div>
            <div class="remember-me">
              <input type="checkbox" id="remember-me" name="remember-me" value="1"/>
              <label for="remember-me">Remember Me</label>
            </div>
            <div class="forget">
              <a href="# ">Forgot Your Password?</a>
            </div>
            <button class="button" type="submit" name="login">Log in</button>
            <div class="Sign-Up">
              <p>Don 't have a account? <a href="/register?redirect=login">Sign Up</a></p>
            </div>
          </form>
          <div class="sessionerror">
            <?php 
              if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
              }
            ?>
          </div>
        </div>
      </div>
    </section>
    <!--Feather Icons-->
    <script>
      feather.replace();
    </script>
  </body>
</html>