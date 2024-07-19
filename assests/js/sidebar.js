document.addEventListener("DOMContentLoaded", function (event) {
  const showNavbar = (
    toggleId,
    toggle1,
    toggle2,
    toggleId2,
    navId,
    bodyId,
    headerId
  ) => {
    const toggle = document.getElementById(toggleId),
      bobo1 = document.getElementById(toggle1),
      bobo2 = document.getElementById(toggle2),
      headToggle = document.getElementById(toggleId2),
      nav = document.getElementById(navId),
      bodypd = document.getElementById(bodyId),
      headerpd = document.getElementById(headerId);

    // Validate that all variables exist
    if (toggle && nav && bodypd && headerpd) {
      toggle.addEventListener("click", () => {
        // show navbar
        nav.classList.toggle("showIt");
        // change icon
        toggle.classList.toggle("bx-x");
        // add padding to body
        bodypd.classList.toggle("body-pd");
        // add padding to header
        //headerpd.classList.toggle('body-pd')
        // bobo1.classList.toggle("visually-hidden");
        headToggle.classList.toggle("bx-x");
        bobo2.classList.toggle("visually-hidden");
      });
    }
    // headToggle.addEventListener("click", () => {
    //   nav.classList.toggle("showIt");
    //   // change icon
    //   toggle.classList.toggle("bx-x");
    //   // add padding to body
    //   bodypd.classList.toggle("body-pd");
    //   // add padding to header
    //   //headerpd.classList.toggle('body-pd')
    //   bobo1.classList.toggle("visually-hidden");
    //   headToggle.classList.toggle("bx-x");
    //   bobo2.classList.toggle("visually-hidden");
    // });
  };

//   nav.addEventListener("click", (e) => {
//     if (nav.classList.contains("showIt")) {
//       e.stopPropagation();
//     }
//   });

//   // Prevent scrolling when header is clicked
//   headerpd.addEventListener("click", (e) => {
//     if (nav.classList.contains("showIt")) {
//       e.stopPropagation();
//     }
//   });

  showNavbar(
    "header-toggle",
    "toggle1",
    "toggle2",
    "header-toggle2",
    "nav-bar",
    "body-pd",
    "header"
  );

  /*===== LINK ACTIVE =====*/
  // const linkColor = document.querySelectorAll('.nav_link')

  // function colorLink(){
  // if(linkColor){
  // linkColor.forEach(l=> l.classList.remove('active'))
  // this.classList.add('active')
  // }
  // }
  // linkColor.forEach(l=> l.addEventListener('click', colorLink))

  // Your code to run since DOM is loaded and ready
});
