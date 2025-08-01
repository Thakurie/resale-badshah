function changeMain(thumb) {
    const mainImg = document.getElementById('main-image');
    mainImg.src = thumb.src;
    document.querySelectorAll('.thumb').forEach(img => img.classList.remove('active'));
    thumb.classList.add('active');
}

