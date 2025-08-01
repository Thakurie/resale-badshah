function previewImage(event, num) {
    const input = event.target;
    const reader = new FileReader();
    reader.onload = function () {
        const img = document.getElementById("preview" + num);
        img.src = reader.result;
    };
    if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
}




