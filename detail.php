<?php
error_reporting(0);
include("config.php");

function get($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);
  return $output;
}
if(!$_GET['surat']){
  header("location:index.php");
}
$var=json_decode(get("https://api.quran.sutanlab.id/surah/".$_GET['surat']),true);
$url = "https://al-quran-online.herokuapp.com/detail.php?surat=".$_GET['surat']."";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Ilham Budiawan Sitorus">
  <meta name="generator" content="Hugo 0.79.0">
  <?php if ($var['code']==404): ?>
    <?php header("HTTP/1.0 404 Not Found"); ?>
    <title>404 page not found</title>
  <?php endif; ?>

  <?php if($var['code']!==404){ ?>
    <meta property="og:type" content="Al-Qur'an Online" />
    <meta property="og:title" content="Al-Qur'an Online" />
    <meta property="og:description" content="<?php echo $site; ?>/baca.php?surat=<?php echo htmlentities($_GET['surat']) ?>" />
    <meta property="og:url" content="<?php echo $url; ?>/baca.php?surat=<?php echo htmlentities($_GET['surat']) ?>" />
    <meta property="og:image" content="assets/icon.jpg" />
    <meta name="msapplication-navbutton-color" content="aqua"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="aqua"/>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">
  <?php }else{ ?>
    <meta property="og:type" content="Al-Qur'an Online" />
    <meta property="og:title" content="404 Page Not Found" />
    <meta property="og:description" content="404 Page Not Found" />
    <meta property="og:url" content="<?php echo $url; ?>/baca.php?surat=<?php echo htmlentities($_GET['surat']) ?>" />
    <meta property="og:image" content="assets/icon.jpg" />
    <meta name="msapplication-navbutton-color" content="aqua"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="aqua"/>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">
  <?php } ?>
  <link rel="shortcut icon" href="assets/icon.jpg">
  <title><?php echo $var['data']['name']['transliteration']['id']; ?> - <?php echo $var['data']['name']['short'] ?> | Al-Qur'an Online</title>
  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* stylelint-disable selector-list-comma-newline-after */
    a {text-decoration: none}
    .blog-header {
      line-height: 1;
      border-bottom: 1px solid #e5e5e5;
    }

    .responsive{
      max-width:100%;
    }

    .blog-header-logo {
      font-family: "Playfair Display", Georgia, "Times New Roman", serif/*rtl:Amiri, Georgia, "Times New Roman", serif*/;
      font-size: 2.25rem;
    }

    .blog-header-logo:hover {
      text-decoration: none;
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: "Playfair Display", Georgia, "Times New Roman", serif/*rtl:Amiri, Georgia, "Times New Roman", serif*/;
    }

    .display-4 {
      font-size: 2.5rem;
    }
    @media (min-width: 768px) {
      .display-4 {
        font-size: 3rem;
      }
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .nav-scroller .nav-link {
      padding-top: .75rem;
      padding-bottom: .75rem;
      font-size: .875rem;
    }

    .card-img-right {
      height: 100%;
      border-radius: 0 3px 3px 0;
    }

    .flex-auto {
      flex: 0 0 auto;
    }

    .h-250 { height: 250px; }
    @media (min-width: 768px) {
      .h-md-250 { height: 250px; }
    }

    /* Pagination */
    .blog-pagination {
      margin-bottom: 4rem;
    }
    .blog-pagination > .btn {
      border-radius: 2rem;
    }

/*
 * Blog posts
 */
 .blog-post {
  margin-bottom: 4rem;
}
.blog-post-title {
  margin-bottom: .25rem;
  font-size: 2.5rem;
}
.blog-post-meta {
  margin-bottom: 1.25rem;
  color: #727272;
}

/*
 * Footer
 */
 .blog-footer {
  padding: 2.5rem 0;
  color: #727272;
  text-align: center;
  background-color: #f9f9f9;
  border-top: .05rem solid #e5e5e5;
}
.blog-footer p:last-child {
  margin-bottom: 0;
}


.bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

@media (min-width: 768px) {
  .bd-placeholder-img-lg {
    font-size: 3.5rem;
  }
}
</style>


<!-- Custom styles for this template -->
<link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
</head>
<body>

  <div class="container">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="link-secondary" href="https://trakteer.id/ilham-budiawan">Donasi</a>
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="index.php">Al-Qur'an Online</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="link-secondary" href="#" aria-label="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
          </a>
          <a class="link-secondary" href="https://www.belajarwithib.my.id/">Blog</a>
        </div>
      </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-between">
        <a class="p-2 link-secondary" href="https://github.com/sutanlab/quran-api">API</a>
        <a class="p-2 link-secondary" href="https://getbootstrap.com/">Template</a>
      </nav>
    </div>
  </div>

  <main class="container">
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
      <div class="col-md-12 px-0">
        <h1 class="display-4 font-italic"><?php echo $var['data']['name']['transliteration']['id'] ?></h1>
        <p class="my-3"><?php echo $var['data']['tafsir']['id'] ?>.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

        <article class="blog-post">
          <?php
          $no=1;
          for ($i=0; $i < count($var['data']['verses']); $i++) {
            ?>
            <hr>
            <div class="row">
              <div class="col-md-5">
                <p><strong class="display-6"><?php echo $var['data']['verses'][$i]["text"]['arab'] ?></strong>
                  <br><?php echo $var['data']['verses'][$i]['text']['transliteration']['en'] ?></p>
                  <br><p><strong>Artinya: </strong><?php echo $var['data']['verses'][$i]['translation']['id'] ?></p>

                    <a href="https://api.whatsapp.com/send?text=<?php echo $var['data']['name']['transliteration']['id'] ?> - <?php echo $var['data']['verses'][$i]["text"]['arab'] ?> - <?php echo $var['data']['verses'][$i]['translation']['id'] ?>-<?php echo $url;  ?>" class="btn btn-outline-info btn-sm" target="_blank">Whatsapp</a>
                </div>

                <div class="col-md-4 ms-auto"><br>
                  <audio class="responsive" controls>
                    <source src="<?php echo $var['data']['verses'][$i]['audio']['primary'] ?>" type="audio/mpeg" >
                    </audio>
                  </div>
                </div>
                <hr>
                <?php
              }
              ?>
            </article><!-- /.blog-post -->

            <nav class="blog-pagination" aria-label="Pagination">
              <?php if ($_GET['surat']==1) { ?>
                <a class="btn btn-outline-primary" href="index.php">Sebelumnya</a>
              <?php }else{ ?>
                <a class="btn btn-outline-primary" href="detail.php?surat=<?php echo htmlentities($_GET['surat'])-1; ?>">Sebelumnya</a>
              <?php } ?>

              <?php if($_GET['surat']>113 || $var['code']==404){ ?>

              <?php }else{ ?>
                <a class="btn btn-outline-success" href="detail.php?surat=<?php echo htmlentities($_GET['surat'])+1; ?>">Selanjutnya</a>
              <?php } ?>
            </nav>

          </div>

        </div><!-- /.row -->
      </main><!-- /.container -->

      <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>By: <a href="https://www.belajarwithib.my.id/">Ilham Budiawan Sitorus</a>.</p>
        <p>Docs api: <a href="https://github.com/sutanlab/quran-api">api.quran.sutanlab.id</a>.</p>
        <p>
          <a href="#">Back to top</a>
        </p>
      </footer>

      <script type="text/javascript">
        function copy_text() {
          document.getElementById("pilih").select();
          document.execCommand("copy");
          alert("Text berhasil dicopy");
        }
      </script>

    </body>
    </html>
