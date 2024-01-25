// Smooth Scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
      e.preventDefault();

      document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
      });
  });
});

// Navbar and Web Pages Background Change on Scroll
window.addEventListener('scroll', function () {
  const navbar = document.querySelector('.navbar');
  const webPages = document.querySelectorAll('.web-page');

  if (window.scrollY > 10) {
      navbar.classList.add('active');
      webPages.forEach(page => page.classList.add('active'));
  } else {
      navbar.classList.remove('active');
      webPages.forEach(page => page.classList.remove('active'));
  }
});
