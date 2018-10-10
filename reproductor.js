 var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '250',
          width: '270',
          playerVars: {'color':'white','cc_load_policy':0,'disablekb':1,'fs':0,
           'iv_load_policy':3,'modestbranding':1, 'rel':0,
            'showinfo':0, 
            'listType':'playlist',
            'list':'PLWO2m0Y4HA5czJ_lPT0ZIqKAC_01LaNFC',
             'loop':1
            },
          events: {
            'onReady': onPlayerReady,
          }
        });
      }

      function onPlayerReady(event) {
        event.target.setVolume(20);
        player.setShuffle(true);
        event.target.playVideo();

      }

      function setShuffleFunction(){
        player.setShuffle(True);
      }

      function stopVideo() {
        player.stopVideo();
      }