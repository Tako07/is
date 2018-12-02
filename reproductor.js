var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player;
    /**
    *@description Funcion para darle al reproductor la informacion necesaria
    */
    function onYouTubeIframeAPIReady() {
      player = new YT.Player('player', {
        /*Altura del reproductor*/
        height: '250',
        /*Anchura del reproductor*/
        width: '270',
        playerVars: {
          /*Color de la barra */
          'color':'white',
          'cc_load_policy':0,'disablekb':1,'fs':0,
         'iv_load_policy':3,'modestbranding':1, 'rel':0,        //opciones del reproductor, color, informacion 
          'showinfo':0, 
          /*Tipo de link*/
          'listType':'playlist',
          /*Lista a reproducir*/
          'list':'PLxWlrEaWzjr69zfvE5IFSjo-gtU_baz-b',
         //la playlist estara en un loop
         'loop':1 
          },
        events: {
          /*Cuando termine de configurarse se reproducira*/
          'onReady': onPlayerReady,
        }
      });
    }
    /**
    *@description Funcion para darle las ultimas configuraciones
    */
    function onPlayerReady(event) {
      event.target.setVolume(20);     //volumen de los videos
      player.setShuffle(true);        //la lista se reproducira aleatoriamente (aun no sirve)
      event.target.playVideo();       //reproduce los videos

    }