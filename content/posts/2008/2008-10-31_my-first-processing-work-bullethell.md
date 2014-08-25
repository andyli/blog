Title: My first Processing work - BulletHell
Date: 2008-10-31 06:02
Tags: Processing
Slug: my-first-processing-work-bullethell

Here is my first Processing work, shown to you by the mighty
processing.js.  
It can't be shown on IE.

<!-- PELICAN_END_SUMMARY -->

<canvas id="bulletHellCanvas" width="680" height="480">
</canvas>

Source code:

```java
float[][] rocks = new float[50][4];
float[] ship = new float[2];
int lifetime = 0;
int gameStatus = 1; //0:playing, 1:pause, 2:end
int[] keyIsDown = new int[4]; //up, right, down, left
float addSpeed = 0;

PFont font;

void setup(){
  size(480,320);
  frameRate(30);
  smooth();
  noStroke();

  font = loadFont("Serif-48.vlw");

  init_var();

  //display instruction
  background(150);
  textFont(font, 22);
  text("Press r to start/restart", 10, height/2 - 30);
  text("Use your mouse to move", 10, height/2);
  text("Press P pause", 10, height/2 + 30);
}

void draw(){
  if (gameStatus == 0){
    background(0);

    lifetime++;

    //move ship
    ship[0]+=(mouseX-ship[0])*0.3;
    ship[1]+=(mouseY-ship[1])*0.3;

    ellipse(ship[0],ship[1],20,20);

    if (lifetime < 10000){
     addSpeed = lifetime;
     addSpeed = addSpeed/1000 +1;
    }

    //move rocks
    for(int i = 0;i<50;i++){
      rocks[i][0]+=rocks[i][2]*addSpeed;
      rocks[i][1]+=rocks[i][3]*addSpeed;
      ellipse(rocks[i][0],rocks[i][1],4,4);
      if(dist(rocks[i][0],rocks[i][1],ship[0],ship[1])<12){ //hit ship?
        gameStatus = 2;
      } else if (rocks[i][0]<-10 || rocks[i][1]<-10 || rocks[i][0]>width+10 || rocks[i][1]>height+10){//go away from screen area?
        rocks[i][0] = random(width);
        rocks[i][1] = random(-5);
      }
    }

  } else if (gameStatus == 2){//game end
    background(150);
    text("Game over. Your score: " + lifetime, 10, height/2);
    noLoop();
  }
}

void keyPressed(){
  //resume game?
  if (key == 'p'){
    if (gameStatus == 0){
      gameStatus = 1;
    } else if (gameStatus == 1){
      gameStatus = 0;
    }
  } else if (key == 'r'){
    gameStatus = 0;
    init_var();
    loop();
  }
}

void init_var(){
  lifetime = 0;

  ship[0] = width/2;
  ship[1] = height/2;

  for(int i = 0;i<50;i++){
    rocks[i][0] = random(width);
    rocks[i][1] = random(-5);
    rocks[i][2] = random(-5,5);
    rocks[i][3] = random(5);
  }
}
```

<script src="//cdnjs.cloudflare.com/ajax/libs/processing.js/1.4.8/processing.min.js" type="text/javascript"></script>
<script type="text/javascript">
new Processing("bulletHellCanvas", document.getElementsByTagName("pre")[0].textContent);
</script>

