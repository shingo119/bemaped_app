 <html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Location-based AR.js demo</title>
    <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-look-at-component@0.8.0/dist/aframe-look-at-component.min.js"></script>
    <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar-nft.js"></script>
  </head>

  <body style="margin: 0; overflow: hidden;">
    <a-scene
      vr-mode-ui="enabled: false"
      embedded
      arjs="sourceType: webcam; debugUIEnabled: false;"
    >
      <a-text
        value="YANOS HOUSE"
        look-at="[gps-camera]"
        scale="5 20 5"
        gps-entity-place="latitude:35.7929179287228; longitude:139.62652964041612;"
      ></a-text>
      <a-text
        value="YASAI HANBAI"
        look-at="[gps-camera]"
        scale="5 20 5"
        gps-entity-place="latitude:35.7928372; longitude:139.6260404;"
      ></a-text>
      <a-camera gps-camera rotation-reader> </a-camera>
    </a-scene>
  </body>
</html>