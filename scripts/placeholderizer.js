const images = document.querySelectorAll('img');
function replaceImageSources(newSource) {
    images.forEach(image => {
        console.log(image.getAttribute('src'))
        if ((image.getAttribute('src') == "~")){
            image.setAttribute('src', newSource);
            console.log(image.getAttribute('src'))
        }
    });
  }
  
  // Example: Replace all image sources with a new source
replaceImageSources('https://placehold.jp/150x150.png');