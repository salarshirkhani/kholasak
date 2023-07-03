
// search box

// const menuBtn = document.querySelector('.search-btn');
// const menu = document.querySelector('.showsearch');
        
// let showMenu = false;
        
// menuBtn.addEventListener('click', toggleMenu);
        
// function toggleMenu() {
//   if (!showMenu) {
//       const newLocal = 'show-search';
//     menu.classList.add(newLocal);
//     showMenu = true;
//   } 
//   else {
//     // menu.classList.remove('show-search');
//     showMenu = false;
//   }
// }

// show more code 

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");
  const contentFull = document.getElementById('contentFull');
  var img = document.createElement("img");
  img.src = "img/PinClipart.com_starting-line-clipart_3450109.png";

  if (contentFull.style.height === '400px') {
    btnText.innerHTML = "مشاهده کمتر"+"	&#8679"; 
    
    moreText.style.display = "none";
    document.querySelector('.myB').style.display = "none";
    contentFull.style.height = 'auto';
    
  } else {
    btnText.innerHTML = "مشاهده بیشتر";
    btnText.appendChild(img).style.width ="10px";
    btnText.appendChild(img);
    moreText.style.display = "contents";
    
    document.querySelector('.myB').style.display = "block";
    contentFull.style.height = '400px';
    contentFull.style.overflow = 'hidden';
  }
}



// function myFunction() {
//   var dots = document.getElementById("dots");
//   var moreText = document.getElementById("more");
//   var btnText = document.getElementById("myBtn");
//   const contentFull = document.getElementById('contentFull');
//   var img = document.createElement("img");
//   img.src = "img/PinClipart.com_starting-line-clipart_3450109.png";

//   if (dots.style.display === "none") {
//     dots.style.display = "inline";
//     btnText.innerHTML = "مشاهده بیشتر";
//     btnText.appendChild(img).style.width ="10px";
//     btnText.appendChild(img);
//     moreText.style.display = "none";
//     document.querySelector('.myB').style.display = "block";

//     contentFull.style.maxHeight = '1000px';
    

//   } else {
//     dots.style.display = "none";
//     btnText.innerHTML = "مشاهده کمتر"+"	&#8679"; 
//     moreText.style.display = "contents";
//     document.querySelector('.myB').style.display = "none";

//     contentFull.style.maxHeight = maxHeight;
//   }
// }

/// animation
const the_animation = document.querySelectorAll('.animation')

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('scroll-animation')
        }
            else {
                entry.target.classList.remove('scroll-animation')
            }
        
    })
},
   { threshold: 0.5
   });
//
  for (let i = 0; i < the_animation.length; i++) {
   const elements = the_animation[i];

    observer.observe(elements);
  } 


//slide mobile 



// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal2) {
//     modal2.style.display = "none";
//   }
// }

///new search box 
var isSearchBoxVisible = false;
var searchBox = document.getElementById("searchbox");
var skipClose;

function toggleSearchBox() {
  showSearchBox(!isSearchBoxVisible);
  skipCloseFn();
}

function showSearchBox(show=true){
   searchBox.style.display = show ? '' : 'none'; 
   isSearchBoxVisible = show;
}

function skipCloseFn(){
  skipClose = true;
}

showSearchBox(false);

// This can be directly given in HTML as well as given for outer search icon.
searchBox.querySelector('input').addEventListener('click', skipCloseFn);
//Can be included only if necessary
searchBox.querySelector('button').addEventListener('click', function(e){
  e.preventDefault();
  skipCloseFn();
});


document.addEventListener('click', function(){
  if(!skipClose){
    showSearchBox(false);
  }
  skipClose = false;
});


// mobile 
var isSearchBoxVisiblex = false;
var searchboxx = document.getElementById("searchboxx");
var skipClosex;

function toggleSearchBoxx() {
  showSearchBoxx(!isSearchBoxVisiblex);
  skipCloseFnn();
}

function showSearchBoxx(show=true){
  searchboxx.style.display = show ? '' : 'none'; 
  isSearchBoxVisiblex = show;
}

function skipCloseFnn(){
  skipClosex = true;
}

showSearchBoxx(false);

// This can be directly given in HTML as well as given for outer search icon.
searchboxx.querySelector('input').addEventListener('click', skipCloseFnn);
//Can be included only if necessary
searchboxx.querySelector('button').addEventListener('click', function(e){
  e.preventDefault();
  skipCloseFnn();
});


document.addEventListener('click', function(){
  if(!skipClosex){
    showSearchBoxx(false);
  }
  skipClosex = false;
});


// side bar for [roduct].
const viewportWidth = screen.width;
if (viewportWidth >= 1000) {
  $('#side').stick_in_parent(); 
}   


function increaseCount(a, b) {
  var input = b.previousElementSibling;
  var value = parseInt(input.value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  input.value = value;
}

function decreaseCount(a, b) {
  var input = b.nextElementSibling;
  var value = parseInt(input.value, 10);
  if (value > 1) {
    value = isNaN(value) ? 0 : value;
    value--;
    input.value = value;
  }
}