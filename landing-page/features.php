<style>
  #slider {
    position: relative;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  }
  #slider ul {
    position: relative;
    list-style: none;
    padding: 0;
    margin: 0;
    transition: all 750ms ease;
    left: 0;
  }
  #slider ul li {
    position: relative;
    height: 100%;
    float: left;
  }
  #slider ul li img{
    width: 500px;
    height: 265px;
  }
  #slider #prev, #slider #next {
    width: 50px;
    line-height: 50px;
    border-radius: 50%;
    font-size: 2rem;
    text-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
    text-align: center;
    color: white;
    text-decoration: none;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    transition: all 150ms ease;
  }
  #slider #prev:hover, #slider #next:hover {
    background-color: rgba(0, 0, 0, 0.5);
    text-shadow: 0;
  }
  #slider #prev {
    left: 10px;
    cursor: pointer;
  }
  #slider #next {
    right: 10px;
    cursor: pointer;
  }
  .prevbtn{
    transform:rotate(270deg);
    width: 38px;
    filter: invert(100%);
  }
  .nextbtn{
    transform:rotate(90deg);
    width: 38px;
    filter: invert(100%);
  }
</style>

<div style="max-width: 80%; margin: 1em auto; position: relative; margin-top: 100px; margin-bottom: 80px;" class="d-flex justify-content-center">
  <div id="slider" class="slider-wrapper">
    <ul id="slideWrap" class="inner"> 
      <article><img src="/distant-elogistics/images/feature 1.jpg" alt=""></article>
      <article><img src="/distant-elogistics/images/feature 2.jpg" alt=""></article>
      <article><img src="/distant-elogistics/images/feature 3.jpg" alt=""></article>
    </ul>
    <a id="prev"><img class="prevbtn" src="/distant-elogistics/images/arrow.png"></a>
    <a id="next"><img class="nextbtn" src="/distant-elogistics/images/arrow.png"></a>
  </div>
</div>

<script>
  var responsiveSlider = function() {

  var slider = document.getElementById("slider");
  var sliderWidth = slider.offsetWidth;
  var slideList = document.getElementById("slideWrap");
  var count = 1;
  var items = slideList.querySelectorAll("article").length;
  var prev = document.getElementById("prev");
  var next = document.getElementById("next");

  window.addEventListener('resize', function() {
    sliderWidth = slider.offsetWidth;
  });

  var prevSlide = function() {
    if(count > 1) {
      count = count - 2;
      slideList.style.left = "-" + count * sliderWidth + "px";
      count++;
    }
    else if(count = 1) {
      count = items - 1;
      slideList.style.left = "-" + count * sliderWidth + "px";
      count++;
    }
  };

  var nextSlide = function() {
    if(count < items) {
      slideList.style.left = "-" + count * sliderWidth + "px";
      count++;
    }
    else if(count = items) {
      slideList.style.left = "0px";
      count = 1;
    }
  };

  next.addEventListener("click", function() {
    nextSlide();
  });

  prev.addEventListener("click", function() {
    prevSlide();
  });

  setInterval(function() {
    nextSlide()
  }, 5000);

  };

  window.onload = function() {
  responsiveSlider();  
  }
</script>