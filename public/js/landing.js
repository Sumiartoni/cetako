// Smooth scroll for all anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

// FAQ accordion - open first item by default
const firstFaq = document.querySelector('[data-faq]');
if (firstFaq) firstFaq.classList.add('open');

// Re-initialize Lucide icons for dynamically rendered content
if (typeof lucide !== 'undefined') {
    lucide.createIcons();
}
