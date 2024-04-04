
//scrolltrigger set up
const items = document.querySelectorAll('section');

items.forEach((item) => {
  //observer.observe(item);
  gsap.from(item, {
    scrollTrigger: {
		start: 'top 50%',
		trigger: item,
      onEnter: () => {
      	item.classList.add("active");        
    	},
		//markers: true // debug markers
    }
  });
});


// Retrieve all tab links
const tabLinks = document.querySelectorAll('.custom-tab-control .link-box-link');

// Attach click event listener to each tab link
tabLinks.forEach((tabLink) => {
  tabLink.addEventListener('click', handleTabClick);
});

// Click event handler for tab links
function handleTabClick(event) {
    console.log('control clicked');
  const target = event.currentTarget.getAttribute('data-target');

  // Activate the selected tab link
  tabLinks.forEach((tabLink) => {
    tabLink.classList.toggle('active', tabLink === event.currentTarget);
  });

  // Show the corresponding tab content
  showTabContent(target);
}

// Show the specified tab content
function showTabContent(target) {
  console.log(target);
  const tabContent = document.querySelector(target);

  // Hide all tab content
  const allTabContent = document.querySelectorAll('.tab-content');
  allTabContent.forEach((content) => {
    content.style.display = 'none';
  });

  // Show the selected tab content with animation
  if (tabContent) {
    tabContent.style.display = 'block';
    gsap.fromTo(tabContent, { opacity: 0, x: -50 }, { opacity: 1, x: 0, duration: 0.5 });
  }
}

document.addEventListener('DOMContentLoaded', function() {
  //open a tab from the URL
  // Get the tab name from the URL parameter
  const urlParams = new URLSearchParams(window.location.search);
  const tabName = urlParams.get('tab');
 
  // Activate the tab based on the tab name
  if (tabName) {
    const targetElement = document.querySelector('[data-target="#' + tabName + '"]');
    const childElement = targetElement.querySelector('.link-box');
    //console.log(tabName);
    showTabContent('#' + tabName);
    targetElement.classList.toggle('active');
    childElement.classList.toggle('active');
    scrollToPosition(targetElement.offsetTop);
  }


  document.querySelectorAll(".navbar-toggler, .close-icon").forEach(function(element) {
      element.addEventListener("click", function() {
          document.body.classList.toggle("no-scroll");
      });
  });
});


// Scroll to a specific position on the page using GSAP
function scrollToPosition(position) {
  gsap.to(window, {
    duration: 1, // Set the duration of the scroll animation (in seconds)
    scrollTo: {
      y: position
    },
    ease: 'power1.out' // Set the easing function for the animation
  });
}

//parallax
gsap.utils.toArray(".parallax", ).forEach((section, i) => {
    if(innerHeight > innerWidth){
      //need to create a better experience for mobile
      return false;
    }
    section.bg = section.querySelector(".parallax-wrapper"); 
    section.bg.style.backgroundPosition = `50% ${innerHeight / 2}px`;

    gsap.to(section.bg, {
      backgroundPosition: `50% ${-innerHeight / 2}px`,
      ease: "none",
      scrollTrigger: {
        trigger: section,
        scrub: true
      }
    });
  
});


