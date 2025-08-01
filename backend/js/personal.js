

const inputFile = document.getElementById('input-file');
const profilePic = document.getElementById('profile-pic');

inputFile.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
        profilePic.src = URL.createObjectURL(file);
    }
});
