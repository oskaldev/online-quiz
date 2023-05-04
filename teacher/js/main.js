const upbtn = document.createElement('div');
upbtn.classList.add('upbtn');
document.body.appendChild(upbtn);
window.addEventListener('scroll', function () {
  if (window.pageYOffset > 100) {
    upbtn.style.transform = 'scale(1)';
  } else {
    upbtn.style.transform = 'scale(0)';
  }
});
upbtn.addEventListener('click', function () {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});
