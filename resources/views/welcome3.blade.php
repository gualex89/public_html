<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="https://unpkg.com/fabric@5.3.0/dist/fabric.min.js"></script>
  <style>
    canvas {
      border: 4px solid #323232;
    }

    input {
      margin: 8px 0;
    }
  </style>
</head>

<body>
  <h2>Fabric.Canvas demo</h2>
  <input accept="image/*" type="file" name="image" id="input" />
  <button id="btn">Generar imagen</button>
  <canvas id="canvas"></canvas>
  <script>
    const canvas = new fabric.Canvas("canvas");
    canvas.setWidth(innerWidth - 100);
    canvas.setHeight(innerHeight - 2 + 00);
    var rect = new fabric.Rect({
      left: 100,
      top: 100,
      fill: "red",
      width: 50,
      height: 50,
    });
    canvas.add(rect);
    input.onchange = (evnt) => {
      const file = evnt.target.files[0];
      const url = URL.createObjectURL(file);
      const imgNode = new Image();
      imgNode.src = url;
      imgNode.onload = () => {
        const img = new fabric.Image(imgNode, {
          left: 100,
          top: 100,
          angle: 30,
          opacity: 1,
        });
        canvas.add(img); // esta es la mágia
      };
    };
    btn.onclick = () => {
      const dataURL = canvas.toDataURL("image/png");
      const a = document.createElement("a");
      a.download = "yutu";
      a.href = dataURL;
      a.click();
    };
  </script>
</body>

</html>