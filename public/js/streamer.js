class streamer {

    constructor(id) {
      this._id = id;
      this._hls = null;
      this._config = {
        autoStartLoad: true,
        liveSyncDurationCount: 1,
        startPosition: 352
      }
    }
    
    // strat straming video
    start(cameraId) {
        if (Hls.isSupported()) {
            var video = document.getElementById(this._id);
            var _hls = new Hls(this._config);

            // bind them together
            _hls.attachMedia(video);
            _hls.on(Hls.Events.MEDIA_ATTACHED, function() {
              console.log("video and hls.js are now bound together !");
              _hls.loadSource(`cameras/cam${cameraId}/mystream.m3u8`);
              _hls.on(Hls.Events.MANIFEST_PARSED, function(event, data) {
                console.log(
                  "manifest loaded, found " + data.levels.length + " quality level"
                );
              });
            });
        }
       
        console.log(_hls.currentLevel);
          
        const player = new Plyr(`#${this._id}`, {
            autoplay: true,
            waiting: true,
            title: "Camera",
            controls: [
              "play-large",
              // "play",
              // "progress",
              // "current-time",
              // "mute",
              // "volume",

              // "pip",
              // "airplay",
              // "fullscreen"
            ],
        
            invertTime: false,
            hideControls: false,
            download: true
        });
        
        player.on("ready", event => {
            const instance = event.detail.plyr;
            // updateTime(player);
            // showTime();
            
        });
        
        player.on("play", () => {
            // updateTime(player);
            console.log("current Time change");
            if (player.duration - player.currentTime > 5) {
              // document.getElementById("goLive").style.visibility = "visible";
            }
        });

    }

    restart(position) {
      // _hls.destroy()
      this._config.startPosition = position;
      console.log( this._config);
      
    }

}