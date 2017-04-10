
@extends('main')
@section('title', ' | Homepage')
@section('content')

  <!-- First Parallax Image with Logo Text -->
  <div class="mainimg w3-display-container w3-opacity-min" id="home">
    <div class="w3-display-middle" style="white-space:nowrap;">
      <span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity">OUR <span class="w3-hide-small">FITNESS</span> HUB</span>
    </div>
  </div>

  <!-- Container (About Section) -->
  <div class="w3-content w3-container w3-padding-64" id="about">
    <h3 class="w3-center">ABOUT ME</h3>
    <p class="w3-center"><em>l enjoy helping to bring out potential</em></p>
    <p>I have been involved in exercise and training essentially my whole life, starting martial arts from a young age. I truly love to push my body and
      mind through the medium of exercise, improving and developing my health and fitness. The invigorating and uplifting feeling I get from accomplishing
      the most intense of sessions is hard to beat. I am in constant competition with myself and enjoy the challenge to outdo my previous performances.</p>
    <div class="w3-row">
      <div class="w3-col m6 w3-center w3-padding-large">
        <p><b><i class="fa fa-user w3-margin-right"></i>Andrea Young</b></p><br>
        <img src="images/pt.jpg" class="w3-round w3-image" alt="Photo of Me" width="500" height="333">
      </div>

      <!-- Hide this text on small devices -->
      <div class="w3-col m6 w3-hide-small w3-padding-large">
        <p>Welcome to my website. I am lorem ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
          dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
    </div>
    <p class="w3-large w3-center w3-padding-16">Your Goals - My Specialization:</p>
    <p class="w3-wide"><i class="fa fa-camera"></i>Muscle Building</p>
    <div class="w3-light-grey">
      <div class="w3-container w3-padding-small w3-dark-grey w3-hover-opacity w3-center" style="width:70%">70%</div>
    </div>
    <p class="w3-wide"><i class="fa fa-laptop"></i>Conditioning</p>
    <div class="w3-light-grey">
      <div class="w3-container w3-padding-small w3-dark-grey w3-hover-opacity w3-center" style="width:95%">95%</div>
    </div>
    <p class="w3-wide"><i class="fa fa-photo"></i>Core</p>
    <div class="w3-light-grey">
      <div class="w3-container w3-padding-small w3-dark-grey w3-hover-opacity w3-center" style="width:85%">85%</div>
    </div>
  </div>

  <div class="w3-row w3-center w3-dark-grey w3-padding-16">
    <div class="w3-quarter w3-section w3-hover-opacity">
      <span class="w3-xlarge">12</span><br>
      Current Clients
    </div>
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">70+</span><br>
      Sessions Completed
    </div>
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">20</span><br>
      Happy Clients
    </div>
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">24/7</span><br>
      Availability
    </div>
  </div>

  <!-- Second Parallax Image with Portfolio Text -->
  <div class="portimg w3-display-container w3-opacity-min">
    <div class="w3-display-middle">
      <span class="w3-xxlarge w3-text-light-grey w3-wide">PORTFOLIO</span>
    </div>
  </div>

  <!-- Container (Portfolio Section) -->
  <div class="w3-content w3-container w3-padding-64" id="portfolio">
    <h3 class="w3-center">MY WORK</h3>
    <p class="w3-center"><em>Here are some of my latest lorem work ipsum tipsum.<br> Click on the images to make them bigger</em></p><br>

    <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
    <div class="w3-row-padding w3-center">
      <div class="w3-col m3">
        <img src="/w3images/p1.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist over the mountains">
      </div>

      <div class="w3-col m3">
        <img src="/w3images/p2.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Coffee beans">
      </div>

      <div class="w3-col m3">
        <img src="/w3images/p3.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Bear closeup">
      </div>

      <div class="w3-col m3">
        <img src="/w3images/p4.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Quiet ocean">
      </div>
    </div>

    <div class="w3-row-padding w3-center w3-section">
      <div class="w3-col m3">
        <img src="/w3images/p5.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist">
      </div>

      <div class="w3-col m3">
        <img src="/w3images/p6.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="My beloved typewriter">
      </div>

      <div class="w3-col m3">
        <img src="/w3images/p7.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Empty ghost train">
      </div>

      <div class="w3-col m3">
        <img src="/w3images/p8.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Sailing">
      </div>
      <button class="w3-button w3-padding-xlarge" style="margin-top:64px">LOAD MORE</button>
    </div>
  </div>

  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
    <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption" class="w3-opacity w3-large"></p>
    </div>
  </div>

  <!-- Third Parallax Image with Portfolio Text -->
  <div class="bookimg w3-display-container w3-opacity-min">
    <div class="w3-display-middle">
       <span class="w3-xxlarge w3-text-dark-grey w3-wide">BOOKING</span>
    </div>
  </div>

  <!-- Grid for pricing tables -->
  <div class="w3-padding-jumbo w3-padding-64">
  <div class="w3-row-padding" style="margin:0 -16px">
    <div class="w3-half w3-margin-bottom">
      <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
        <li class="w3-dark-grey w3-xlarge w3-padding-32">Basic</li>
        <li class="w3-padding-16">4 - Training Sessions</li>
        <li class="w3-padding-16">Photography</li>
        <li class="w3-padding-16">5GB Storage</li>
        <li class="w3-padding-16">Mail Support</li>
        <li class="w3-padding-16">
          <h2>$ 10</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-white w3-padding-large w3-hover-black">Sign Up</button>
        </li>
      </ul>
    </div>

    <div class="w3-half">
      <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
        <li class="w3-dark-grey w3-xlarge w3-padding-32">Pro</li>
        <li class="w3-padding-16">Web Design</li>
        <li class="w3-padding-16">Photography</li>
        <li class="w3-padding-16">50GB Storage</li>
        <li class="w3-padding-16">Endless Support</li>
        <li class="w3-padding-16">
          <h2>$ 25</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-white w3-padding-large w3-hover-black">Sign Up</button>
        </li>
      </ul>
    </div>
  <!-- End Grid/Pricing tables -->
  </div>
  </div>

  <!-- Fourth Parallax Image with Portfolio Text -->
  <div class="contactimg w3-display-container w3-opacity-min">
    <div class="w3-display-middle">
      <span class="w3-xxlarge w3-text-black w3-wide">CONTACT</span>
    </div>
  </div>

  <!-- Container (Contact Section) -->
  <div class="w3-content w3-container w3-padding-64" id="contact">
    <h3 class="w3-center">WHERE I WORK</h3>
    <p class="w3-center"><em>I'd love your feedback!</em></p>

    <div class="w3-row w3-padding-32 w3-section">
      <div class="w3-col m4 w3-container">
        <!-- Add Google Maps -->
        <div id="googleMap" class="w3-round-large w3-greyscale" style="width:100%;height:400px;"></div>
      </div>
      <div class="w3-col m8 w3-panel">
        <div class="w3-large w3-margin-bottom">
          <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Chicago, US<br>
          <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Phone: +00 151515<br>
          <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email: mail@mail.com<br>
        </div>
        <p>Swing by for a cup of <i class="fa fa-coffee"></i>, or leave me a note:</p>
        <form action="/action_page.php" target="_blank">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
          <button class="w3-button w3-black w3-right w3-section" type="submit">
            <i class="fa fa-paper-plane"></i> SEND MESSAGE
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection