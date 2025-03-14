
const slides = document.querySelectorAll('.carousel-slide');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
let current = 0;
let slideInterval;

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.classList.remove('opacity-100');
    slide.classList.add('opacity-0');
    if (i === index) {
      slide.classList.remove('opacity-0');
      slide.classList.add('opacity-100');
    }
  });
}

function nextSlide() {
  current = (current + 1) % slides.length;
  showSlide(current);
}

function prevSlide() {
  current = (current - 1 + slides.length) % slides.length;
  showSlide(current);
}

// Bắt đầu slide đầu tiên
slides[0].classList.add('opacity-100');

// Tự động chạy slide sau mỗi 2s
function startAutoSlide() {
  slideInterval = setInterval(nextSlide, 2000);
}

// Khi người dùng nhấn nút, reset lại thời gian auto
function resetAutoSlide() {
  clearInterval(slideInterval);
  startAutoSlide();
}

// Gắn sự kiện cho nút
nextBtn.addEventListener('click', () => {
  nextSlide();
  resetAutoSlide();
});

prevBtn.addEventListener('click', () => {
  prevSlide();
  resetAutoSlide();
});

// Khởi chạy tự động
startAutoSlide();



//animation khi lướt
  document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll(".hidden-on-scroll");

    // Đảm bảo tất cả element đều KHÔNG có class "show" khi mới load trang
    elements.forEach(el => el.classList.remove("show"));

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
        } else {
          // Nếu muốn hiệu ứng lặp lại mỗi lần scroll lại thì bật dòng này
          entry.target.classList.remove("show");
        }
      });
    }, {
      threshold: 0.1
    });

    elements.forEach(el => observer.observe(el));
  });

