var modal = document.getElementById('myModal');

var images = document.getElementsByClassName('img-modal');
var modalImg = document.getElementById('img01');
var captionText = document.getElementById('caption');

for (var i = 0; i < images.length; i++) {
  var img = images[i];
  img.onclick = function(evt) {
    modal.style.display = "flex";
    modalImg.src = this.src;
    captionText.innerHTML = this.src;

  }
}
var span = document.getElementsByClassName('close')[0];

span.onclick = function() {
  modal.style.display = 'none';
}