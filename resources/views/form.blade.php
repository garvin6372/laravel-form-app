<!DOCTYPE html>
<html lang="en-US">
<!-- Mirrored from template.dsngrid.com/JinnityAI/dark/site/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Jul 2025 15:58:22 GMT -->

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
                <a href="index.html">Home</a>
              </li>
              <!-- <li><a href="index.html#about">About Us</a></li> -->
              <li><a href="/form">Query</a></li>
              <li><a href="site/sa100.html">SA100</a></li>
              <li><a href="site/contact.html">Contact</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="header-top header-top-hamburger">
        <div class="header-container">
          <div class="logo main-logo">
            <a href="index.html">
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
      <header>
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
      </header>

      <div class="wrapper">
        <div class="root-contact">
          <div class="container section-margin">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-box">
                  <h3>AI Automation</h3>
                  
                    @if(session('success'))
                        <p>{{ session('success') }}</p>
                    @endif
                    <form action="/form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- <input type="text" name="full_name" placeholder="Full Name" required><br>
                        <input type="email" name="email" placeholder="Email" required><br>
                        <input type="text" name="phone" placeholder="Phone Number" required><br>
                        <input type="text" name="ni_number" placeholder="NI Number" required><br>

                        <select name="reason" required>
                            <option value="">Select Reason</option>
                            <option value="tax">Tax</option>
                            <option value="self assessment">Self Assessment</option>
                            <option value="payee">Payee</option>
                        </select><br>

                        BRP Front Image: <input type="file" name="brp_front"><br>
                        BRP Back Image: <input type="file" name="brp_back"><br>
                        Bank Statement (PDF): <input type="file" name="bank_statement"><br>
                        Receipts (PDF): <input type="file" name="receipts"><br>

                        <button type="submit">Submit</button>
                    </form> -->

                    <div class="messages"></div>
                    <div class="input__wrap controls">
                      <div class="form-group">
                        <div class="entry">
                          <label>Full name</label>
                          <input id="full_name" type="text" name="full_name" placeholder="Full name" required="required" />
                        </div>
                        <div class="help-block with-errors"></div>
                      </div>

                      <div class="form-group">
                        <div class="entry">
                          <label>Email</label>
                          <input id="email" type="email" name="email" placeholder="Email Address"
                            required="required" />
                        </div>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <div class="entry">
                          <label>Phone no.</label>
                          <input id="phone_no" type="tell" name="phone" placeholder="Phone no." required="required" />
                        </div>
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- <div class="form-group">
                        <div class="entry">
                          <label>DOB</label>
                          <input type="date" name="dob" placeholder="Date" required="required"
                            style="margin-right: -16px" />
                          <label style="color: #fff; position: relative; z-index: -1; margin-top: 4px"><i
                              class="fas fa-calendar"></i></label>
                        </div>
                        <div class="help-block with-errors"></div>
                      </div> -->
                      <div class="form-group">
                        <div class="entry">
                          <label>NI Number</label>
                          <input id="nt_number" type="text" name="ni_number" placeholder="NI number"
                            required="required" />
                        </div>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <div class="entry">
                          <label>UTR Number</label>
                          <input id="utr_number" type="text" name="utr_number" placeholder="UTR number"
                            required="required" />
                        </div>
                        <div class="help-block with-errors"></div>
                      </div>
                      <h5>BRP</h5>
                      <div class="form-group">
                        <div class="entry">
                          <label>Front side</label>
                          <input id="front_side" type="file" accept="image/*" name="brp_front" required="required" />
                        </div>
                        <div class="help-block with-errors"></div>
                      </div>
                      <h5>BRP</h5>
                      <div class="form-group">
                        <div class="entry">
                          <label>Back side</label>
                          <input id="back_side" type="file" accept="image/*" name="brp_back" required="required" />
                        </div>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <div class="entry">
                          <label>Reason</label>
                          <select name="reason" id="reason" style="background: #000; color: #fff; border: none">
                            <option value="tax">Tax</option>
                            <option value="self assessment">Self Assessment</option>
                            <option value="payee">Payee</option>
                          </select>
                        </div>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <div class="entry">
                          <label>Bank Statement</label>
                          <input id="bank_statement" type="file" accept="application/pdf" name="bank_statement"
                            required="required" />
                        </div>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <div class="entry">
                          <label>Receipts</label>
                          <input multiple id="receipts" type="file" accept="application/pdf" name="receipts"
                            required="required" />
                        </div>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="image-zoom" data-dsn="parallax">
                        <button type="submit">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <section class="contact-up section-margin section-padding">
          <div class="container">
            <div class="c-wapp">
              <a href="site/contact.html" class="effect-ajax">
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

<!-- Mirrored from template.dsngrid.com/JinnityAI/dark/site/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Jul 2025 15:58:22 GMT -->

</html>