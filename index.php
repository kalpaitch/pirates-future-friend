<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Imagining New Worlds</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/normalize.css">

  <link rel="stylesheet" href="css/main.css?v9">
  <style>
    @import url("https://use.typekit.net/zrf5ehr.css");
  </style>

  <script src="js/vendor/modernizr-min.js"></script>

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <header class="fixed-top">
    <div class="navbar navbar-light bg-light shadow-sm">
      <div class="container d-flex justify-content-between">

        <h1 class="h3 page-heading">Imagining New Worlds</h1>

        <a href="http://www.hackneypirates.org/" class="navbar-brand">
          <img alt="Literacy Pirates" src="/img/lp_logo.png" class="brand-logo hidden-xs-down">
        </a>
      </div>
    </div>
  </header>

  <main role="main">
    <div id="page-top" class="container-fluid pt-5">
      <section class="container text-center py-5">
        <div class="row">
          <div class="col-md-4 my-3">
            <p>
              Welcome to our website for the Literacy Pirates.
              <br>
              <br>
              Here you can listen to the Young Pirate recordings of what we picture 3021 being like. We have worked so hard on this, so sit back and enjoy.
            </p>
            <footer class="blockquote-footer"><cite title="Source Title">Keira</cite>, Young Pirate</footer>
          </div>
          <div class="col-md-8 my-3">
            <p class="mb-3">
              This exciting project is based on other, imaginary worlds. In our virtual worlds, our Young Pirates travel 1000 years into the future and once there, write a letter home describing what they see and feel. They have considered future technology, the environment, jobs, what people might eat, what people might wear, say and do for fun. They have been advised by a professional actor to help them bring their recordings to life.
              <br>
              <br>
              We salute you all on your wonderful work that we hope you all enjoy very much!
            </p>
            <footer class="blockquote-footer"><cite title="Source Title">Wendy</cite>, Director of Learning, and the team at The Literacy Pirates!</footer>
          </div>
        </div>
      </section>

      <section class="container filter-group pb-2">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <button class="filter-button btn btn-outline-secondary" type="button" data-filter="*">All</button>
            <button class="filter-button btn btn-outline-secondary" type="button" data-filter=".primary">Primary Pirates</button>
            <button class="filter-button btn btn-outline-secondary" type="button" data-filter=".secondary">Secondary Pirates</button>
            <button class="filter-button btn btn-outline-virtual" type="button" data-filter=".virtual">Virtual Pirates</button>
          </div>
          <input class="quicksearch form-control transparent-input" id="quicksearch" type="search" placeholder="Search for a person or a story" aria-label="Search for a person or a story" />
          <div class="input-group-append">
            <button class="search-button btn btn-outline-secondary" type="button">Find</button>
          </div>
        </div>
      </section>
    </div>

    <div id="stories" class="container-fluid py-2 text-white background-container clearfix">
      <object class="background city" data="img/bg_skyline_sm-min.webp" type="image/webp">
        <img src="img/bg_skyline_sm-min.png" loading="lazy" alt="Background city" class="background city"/>
      </object>

      <video autoplay muted loop playsinline poster="img/bg_sky-min.webp" class="background sky">
        <source src="img/bg_sky.mp4?v2" type="video/mp4">
        <img src="img/bg_sky-min.webp" loading="lazy" alt="Background sky" class="background sky"/>
      </video>

      <div class="flex-grid container">

          <!-- BEGINNING OF AUDIO STORIES -->
          <?php
          $directory = './audio';
          $files = scandir($directory);
          $recordings = $files ? array_filter($files, function ($file) use ($directory) {
              return is_file(implode('/', [$directory, $file]));
          }) : NULL;
          if (!empty($recordings)) {
              $classes = [
                  'r1c1', 'r1c2', 'r1c3', 'r1c4', 'r1c5', 'r1c6', 'r1c7',
                  'r2c1', 'r2c2', 'r2c3', 'r2c4', 'r2c5', 'r2c6', 'r2c7',
              ];
              foreach ($recordings as $key => $recording) {
                  $icon = array_rand(array_flip($classes));
                  $filename = pathinfo($recording, PATHINFO_FILENAME);
                  $path = implode('/', [$directory, $recording]);
                  list($name, $category) = array_map('trim', explode('-', $filename));
                  $group = array_search(strtolower($category), ['primary', 'secondary', 'virtual']) !== FALSE ? strtolower($category) : NULL;
                  echo <<<EOT
                    <div class="grid-item {$group}">
                        <a data-action="{$key}-story" class="story avatar avatar-{$icon}">
                        <p class="name">{$name}</p>
                        <p class="title"></p>
                        </a>
                        <audio preload="none" class="audio" id="{$key}-story">
                            <source src="$path">
                            Your browser does not support the audio element.
                        </audio>
                    </div>

                  EOT;
              }
          }
          ?>
          <!-- END OF AUDIO STORIES -->

      </div>
    </div>
  </main>

  <footer class="text-muted bg-light text-light">
    <div class="container clearfix">
      <p class="mb-0 py-3 float-left">Check out the <a href="http://www.hackneypirates.org/writing-challenge" class="alert-link" target="_blank">Literacy Pirates Writing Challenge</a></p>
      <p class="mb-0 py-3 float-left">&nbsp;&nbsp; &copy; <a href="http://www.hackneypirates.org/">Literary Pirates</a> 2020</p>
      <p class="mb-0 py-3 float-right">
        <a href="#">Back to top</a>
      </p>
    </div>
  </footer>


  <!-- Script tags -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script async src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script async src="node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
  <script async src="js/plugins.js"></script>
  <script async src="js/main.js"></script>
</body>

</html>
