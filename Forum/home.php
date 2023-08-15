<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>

  <link rel="stylesheet" href="css/home.css">
  <link rel="icon" type="image/x-icon" href="Image/728.jpg">
  <script src="particles.js-master/particles.min.js"></script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
  <?php
  include "config.php";
  include "header.php";
  ?>

  <section class="home">
    <div id="particles-container"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <form action="">
            <fieldset>
              <legend class="section-title">Category</legend>
              <div class="form-group">
                <a href="home.php" class="anime-link"><i class='bx bx-home'></i> Home</a>
                <a href="FEIT.php" class="anime-link"><i class='bx bx-desktop'></i> FEIT</a>
                <a href="ACG.php" class="anime-link"><i class='bx bxs-game' ></i> ACG Society</a>
                <a href="E-Sport.php" class="anime-link"><i class='bx bxs-joystick' ></i> E-Sport Society</a>
              </div>
            </fieldset>
          </form>
        </div>
        <div class="col-md-9">
          <form action="">
            <fieldset>
              <legend class="section-title">Home Page</legend>
              <p class="anime-text">This is a place for you all to interact and discuss. Please follow the rules of the forum!</p>
              <p class="anime-text">This is the rules of the forum:</p>
              <ul class="anime-text">
                <li><b>Respect for all users</b> - no personal attacks, etc.</li>
                <li><b>Content norms</b> - no swearing, hate speech, false information, etc.</li>
                <li><b>Please have a nice conversation.</b></li>
              </ul>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php
  mysqli_close($connection);
  ?>
</body>

<script>
  particlesJS("particles-container", {
    particles: {
      number: {
        value: 100,
        density: {
          enable: true,
          value_area: 800
        }
      },
      color: {
        value: "#e91e63"
      },
      shape: {
        type: "circle",
        stroke: {
          width: 0,
          color: "#000000"
        },
        polygon: {
          nb_sides: 5
        },
        image: {
          src: "img/github.svg",
          width: 100,
          height: 100
        }
      },
      opacity: {
        value: 0.5,
        random: false,
        anim: {
          enable: false,
          speed: 1,
          opacity_min: 0.1,
          sync: false
        }
      },
      size: {
        value: 3,
        random: true,
        anim: {
          enable: false,
          speed: 40,
          size_min: 0.1,
          sync: false
        }
      },
      line_linked: {
        enable: true,
        distance: 150,
        color: "#e91e63",
        opacity: 0.4,
        width: 1
      },
      move: {
        enable: true,
        speed: 6,
        direction: "none",
        random: false,
        straight: false,
        out_mode: "out",
        bounce: false,
        attract: {
          enable: false,
          rotateX: 600,
          rotateY: 1200
        }
      }
    },
    interactivity: {
      detect_on: "canvas",
      events: {
        onhover: {
          enable: true,
          mode: "repulse"
        },
        onclick: {
          enable: true,
          mode: "push"
        },
        resize: true
      },
      modes: {
        grab: {
          distance: 400,
          line_linked: {
            opacity: 1
          }
        },
        bubble: {
          distance: 400,
          size: 40,
          duration: 2,
          opacity: 8,
          speed: 3
        },
        repulse: {
          distance: 100,
          duration: 0.4
        },
        push: {
          particles_nb: 4
        },
        remove: {
          particles_nb: 2
        }
      }
    },
    retina_detect: true
  });
</script>


</html>