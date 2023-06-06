
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

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "مشاهده بیشتر"+" &#8681"
    moreText.style.display = "none";
    document.querySelector('.myB').style.display = "block";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "مشاهده کمتر"+"	&#8679"; 
    moreText.style.display = "contents";
    document.querySelector('.myB').style.display = "none";
  }
}

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
