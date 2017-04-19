{{--</div>--}}
<!-- First Parallax Image with Logo Text -->
<div class="mainimg w3-container w3-opacity-min" id="home">
    <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity">OUR <span
                        class="w3-hide-small">FITNESS</span> HUB</span>
    </div>
</div>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
    <h3 class="w3-center">ABOUT ME</h3>
    <p class="w3-center"><em>l enjoy helping to bring out potential</em></p>
    <p>{!! $content->about !!}</p>
    <div class="w3-row">
        <div class="w3-col m6 w3-center w3-padding-large">
            <p><b><i class="fa fa-user w3-margin-right"></i>Andrea Young</b></p><br>
            <img src="{{ asset('images/' . $content->image)}}" class="w3-image" alt="Photo of Me" width="500"
                 height="333">
        </div>

        <!-- Hide this text on small devices -->
        <div class="w3-col m6 w3-hide-small w3-padding-large">
            <p>{!! $content->website !!}</p>
        </div>
    </div>
    <p class="w3-large w3-center w3-padding-16">Your Goals - My Specialization:</p>
    <p class="w3-wide"><i class="fa fa-camera"></i>Muscle Building</p>
    <div class="w3-light-grey">
        <div class="w3-container w3-padding-small w3-dark-grey w3-hover-opacity w3-center" style="width:70%">70%
        </div>
    </div>
    <p class="w3-wide"><i class="fa fa-laptop"></i>Conditioning</p>
    <div class="w3-light-grey">
        <div class="w3-container w3-padding-small w3-dark-grey w3-hover-opacity w3-center" style="width:95%">95%
        </div>
    </div>
    <p class="w3-wide"><i class="fa fa-photo"></i>Core</p>
    <div class="w3-light-grey">
        <div class="w3-container w3-padding-small w3-dark-grey w3-hover-opacity w3-center" style="width:85%">85%
        </div>
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
    <p class="w3-center">{!! $content->portfolio !!}</p><br>

</div>


<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
        <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i
                    class="fa fa-remove"></i></span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption" class="w3-opacity w3-large"></p>
    </div>
</div>

<!-- Third Parallax Image with Booking Text -->
<div class="bookimg w3-display-container w3-opacity-min">
    <div class="w3-display-middle">
        <span class="w3-xxlarge w3-text-dark-grey w3-wide">BOOKING</span>
    </div>
</div>

<!-- Container (Booking Section) -->
<div class="w3-content w3-container w3-padding-64" id="portfolio">
    <h3 class="w3-center">Book a Session</h3>
    <p class="w3-center">{!! $content->booking !!}</p><br>

</div>