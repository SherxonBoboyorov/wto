const navbarToggler = document.querySelector(".navbar-toggler i");
const navbarContent = document.querySelector(".navbar-content");
const closeVideo = document.querySelector(".close-video i");
const videoSection = document.querySelector(".video-section");
const videoBoxImg = document.querySelector(".video-box img");
const videoBoxVideo = document.querySelector("video");
const videoPlay = document.querySelector(".video-play");

navbarToggler?.addEventListener("click", () => {
  const open = navbarContent.className.includes("open");
  if (window.innerWidth <= 850) {
    if (open) {
      navbarContent.classList.remove("open");
      navbarToggler.classList.remove("fa-xmark");
      navbarToggler.classList.add("fa-bars");
    } else {
      navbarContent.classList.add("open");
      navbarToggler.classList.add("fa-xmark");
      navbarToggler.classList.remove("fa-bars");
    }
  }
});

console.log(closeVideo);
closeVideo?.addEventListener("click", () => {
  videoSection.classList.remove("active-video");
  videoBoxVideo.pause();
});

videoBoxImg?.addEventListener("click", () => {
  videoSection.classList.add("active-video");
  setTimeout(() => {
    videoBoxVideo.currentTime = 0;
    videoBoxVideo.play();
  }, 1000);
});

videoPlay?.addEventListener("click", () => {
  videoSection.classList.add("active-video");

  setTimeout(() => {
    videoBoxVideo.currentTime = 0;
    videoBoxVideo.play();
  }, 1000);
});

const selectedAll = document.querySelectorAll(".wrapper-dropdown");

selectedAll.forEach((selected) => {
  const optionsContainer = selected.children[2];
  const optionsList = selected.querySelectorAll("div.wrapper-dropdown li");

  selected.addEventListener("click", () => {
    let arrow = selected.children[1];

    if (selected.classList.contains("active")) {
      handleDropdown(selected, arrow, false);
    } else {
      let currentActive = document.querySelector(".wrapper-dropdown.active");

      if (currentActive) {
        let anotherArrow = currentActive.children[1];
        handleDropdown(currentActive, anotherArrow, false);
      }

      handleDropdown(selected, arrow, true);
    }
  });

  // update the display of the dropdown
  for (let o of optionsList) {
    o.addEventListener("click", () => {
      selected.querySelector(".selected-display").innerHTML = o.innerHTML;
    });
  }
});

// check if anything else ofther than the dropdown is clicked
window.addEventListener("click", function (e) {
  if (e.target.closest(".wrapper-dropdown") === null) {
    closeAllDropdowns();
  }
});

// close all the dropdowns
function closeAllDropdowns() {
  const selectedAll = document.querySelectorAll(".wrapper-dropdown");
  selectedAll.forEach((selected) => {
    const optionsContainer = selected.children[2];
    let arrow = selected.children[1];

    handleDropdown(selected, arrow, false);
  });
}

// open all the dropdowns
function handleDropdown(dropdown, arrow, open) {
  if (open) {
    arrow.classList.add("rotated");
    dropdown.classList.add("active");
  } else {
    arrow.classList.remove("rotated");
    dropdown.classList.remove("active");
  }
}
