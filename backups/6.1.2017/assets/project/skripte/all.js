function played(){
        var ca = document.cookie.split(';');
        for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf("played=") == 0) return 0;
        }
        var date = new Date();
        var days = 1;
        date.setTime(date.getTime()+(days*24*60*60*1000));
        document.cookie = "played=0"+"; expires="+date.toGMTString()+"; path=/";
        return 1;
}



  
  /*$(window).on("resize", function () {
      var viewportHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
      $('#map-wrapper').css('height', viewportHeight / 3 * 2);
  }).resize();   */
    
  $(function() {
    $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 500);
          return false;
        }
      }
    });
  });
  
  
  var tag = document.createElement('script');
  
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  
  var player;
  function onYouTubeIframeAPIReady() {
                             
    player = new YT.Player('video-placeholder', {
      videoId: 'szjMgGsfimE',
      playerVars: { rel: 0, 'autoplay': played() },
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
     
  }
  
  function onPlayerReady(event) {
      //event.target.playVideo();
}
  
  function onPlayerStateChange(event) {
  
    if(event.data == 0) {
      var windowOffSet = $(window).scrollTop();
      var mainOffset = $('.content').offset().top;
      console.log(windowOffSet, mainOffset);
      if (windowOffSet < mainOffset) {
        $('html, body').animate({
          scrollTop: $('.content').offset().top + 20
        }, 500);
      }
    }
  }
  function stopVideo() {
    player.stopVideo();
  }
