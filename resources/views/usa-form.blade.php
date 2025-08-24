<!DOCTYPE html>
<html lang="en-US">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="discrption" content="parallax one page" />
  <meta name="keyword"
    content="agency, business, corporate, creative, freelancer, interior, joomla template, K2 Blog, minimal, modern, multipurpose, personal, portfolio, responsive, simple" />

  <!--  Title -->
  <title>JinnityAI - Creative Showcase Portfolio Template</title>

  <!-- Font Google -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800&amp;display=swap"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700&amp;display=swap" rel="stylesheet" />

  <link rel="shortcut icon" href="/site/assets/img/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="/site/assets/img/favicon.ico" type="image/x-icon" />

  <!-- custom styles (optional) -->
  
  <link rel="stylesheet" href="{{ asset('site/assets/css/plugins.css') }}">
  <link rel="stylesheet" href="{{ asset('site/assets/css/style.css') }}">
</head>

<body class="hamburger-menu dsn-effect-scroll dsn-ajax" data-dsn-mousemove="true">
  <div class="preloader">
    <div class="preloader-after"></div>
    <div class="preloader-before"></div>
    <div class="preloader-block">
      <div class="title">JinnityAI</div>
      <div class="percent">0</div>
      <div class="loading">loading...</div>
    </div>
    <div class="preloader-bar">
      <div class="preloader-progress"></div>
    </div>
  </div>

  <!-- Nav Bar -->
    <div class="dsn-nav-bar">
      <div class="site-header">
        <div class="extend-container">
          <div class="inner-header">
            <div class="main-logo">
              <a href="index.html">
                <img class="dark-logo" src="assets/img/logo-dark.png" alt="" />
                <h4 style="font-weight: 600">JinnityAI</h4>
              </a>
            </div>
          </div>
          <nav class="accent-menu main-navigation">
            <ul class="extend-container">
              <li>
                <a href="/site/index.html">Home</a>
              </li>
              <!-- <li><a href="index.html#about">About Us</a></li> -->
               <li><a href="/usa-form">Upload Form</a></li>
              <li><a href="/form">Query</a></li>
              <li><a href="/site/sa100.html">SA100</a></li>
              <li><a href="/site/contact.html">Contact</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="header-top header-top-hamburger">
        <div class="header-container">
          <div class="logo main-logo">
            <a href="/site/index.html">
              <img class="dark-logo" src="assets/img/logo-dark.png" alt="" />
              <h4 style="font-weight: 600">JinnityAI</h4>
            </a>
          </div>

          <div class="menu-icon" data-dsn="parallax" data-dsn-move="5">
            <div class="icon-m">
              <i class="menu-icon-close fas fa-times"></i>
              <span class="menu-icon__line menu-icon__line-left"></span>
              <span class="menu-icon__line"></span>
              <span class="menu-icon__line menu-icon__line-right"></span>
            </div>

            <div class="text-menu">
              <div class="text-button">Menu</div>
              <div class="text-open">Open</div>
              <div class="text-close">Close</div>
            </div>
          </div>

          <div class="nav">
            <div class="inner">
              <div class="nav__content"></div>
            </div>
          </div>
          <div class="nav-content">
            <div class="inner-content">
              <address class="v-middle">
                46, Edgerton Gardon , <br />NW4 4BA, London, <br />United Kingdom
              </address>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Nav Bar -->

  <main class="main-root">
    <div id="dsn-scrollbar">
      <!-- <header>
        <div class="container header-hero">
          <div class="row">
            <div class="col-lg-6">
              <div class="contenet-hero">
                <h5>Let's talk</h5>
                <h1>Query</h1>
              </div>
            </div>
          </div>
        </div>
      </header> -->

      <div class="wrapper">
        <div class="root-contact">
          <div class="container section-margin">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-box">
                  <h3>Statement Summary</h3>
                  @isset($success)
                        <p>{{ $success }}</p>
                  @endisset
                  <form action="/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="messages"></div>
                    <div class="input__wrap controls">
                      <div class="form-group">
                        <div class="entry">
                          <label>Upload Your Files Here</label>
                          <input type="file" name="files[]" multiple accept="application/pdf">
                        </div>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="image-zoom" data-dsn="parallax">
                        <button type="submit" class="submit_button">Submit</button>
                      </div>
                    </div>
                  </form>
                  @isset($files)
		     <button><a type="button" href="/usa-form">Add New Record</a> </button>
                    <h3>Uploaded Files</h3>
                    <table>
                        <tr>
                            <th>Icon</th>
                            <th>File Name</th>
                        </tr>
                        @foreach($files as $file)
                            <tr>
                                <td class="pdf-icon"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
</svg>
</td>
                                <td><a href="{{ $file }}" target="_blank">{{ basename($file) }}</a></td>
                            </tr>
                        @endforeach
                    </table>

                    <button id="sendWebhookBtn">Send Files To Workflow</button>

                    <script>
                        document.getElementById('sendWebhookBtn').addEventListener('click', function() {
                            fetch("{{ route('send.webhook') }}", {
                                method: "POST",
                               headers: {

            "Content-Type": "application/json",

            "X-CSRF-TOKEN": "{{ csrf_token() }}"

        },
                                body: JSON.stringify({ files: @json($files) }),
                            })
                            .then(res => res.json())
                            .then(data => {
if(data.success == false) { alert('response')}
console.log(data)
                                // alert("Webhook Response: " + JSON.stringify(data));
                            });
                        });
const elementsToHide = document.querySelectorAll('.submit_button');



// Iterate through the NodeList and set display to 'none'

elementsToHide.forEach(element => {

  element.style.display = 'none';

});
                    </script>
                    

                @endisset
                </div>
              </div>
            </div>
          </div>
        </div>

        <section class="contact-up section-margin section-padding">
          <div class="container">
            <div class="c-wapp">
              <a href="contact.html" class="effect-ajax">
                <span class="hiring"> Contact Us </span>
                <span class="career"> Let's talk </span>
              </a>
            </div>
          </div>
        </section>

        <footer>
          <div class="info">
            <div class="contact-footer">
              <a href="tel:010" class="phone image-zoom" data-dsn="parallax">012.345.6789</a>
              <a href="#" class="email image-zoom" data-dsn="parallax">info@dsngrid</a>
            </div>
            <div class="copyright-social">
              <p>© 2019 Design Grid</p>
              <ul>
                <li class="image-zoom" data-dsn="parallax">
                  <a href="#" target="_blank">Instagram</a>
                </li>
                <li class="image-zoom" data-dsn="parallax">
                  <a href="#" target="_blank">Facebook</a>
                </li>
                <li class="image-zoom" data-dsn="parallax">
                  <a href="#" target="_blank">Linkedin</a>
                </li>
              </ul>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </main>

  <!-- Wait Loader -->
  <div class="wait-loader">
    <div class="loader-inner">
      <div class="loader-circle">
        <div class="loader-layer"></div>
      </div>
    </div>
  </div>
  <!-- // Wait Loader -->

  <!-- cursor -->
  <div class="cursor">
    <div class="cursor-helper cursor-view">
      <span>VIEW</span>
    </div>

    <div class="cursor-helper cursor-close">
      <span>Close</span>
    </div>

    <div class="cursor-helper cursor-link"></div>
  </div>
  <!-- End cursor -->

  <!-- Optional JavaScript -->
  <script src="{{ asset('/site/assets/js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('/site/assets/js/plugins.js') }}"></script>
  <script src="{{ asset('/site/assets/js/dsn-grid.js') }}"></script>

  <script src="{{ asset('/site/assets/js/custom.js') }}"></script>
</body>

<!-- Mirrored from template.dsngrid.com/JinnityAI/dark/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Jul 2025 15:58:22 GMT -->

</html>