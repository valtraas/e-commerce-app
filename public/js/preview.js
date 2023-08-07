

function previewImage() {
    const image = document.querySelector('#image-input')
    const imagePreview = document.querySelector('.img-preview')

    imagePreview.classList.add('block')
    imagePreview.classList.add('my-10')

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0])
    oFReader.onload = function (oFREvent) {
        imagePreview.src = oFREvent.target.result;
    }

}