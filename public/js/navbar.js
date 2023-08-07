function burger(e) {
    const list = document.querySelector('ul');

    e.name === 'menu' ? (e.name = 'close', list.classList.add('top-[76px]'), list.classList.add('opacity-100'), list.classList.remove('-z-10')) : (e.name = 'menu', list.classList.remove('top-[76px]'), list.classList.remove('opacity-100'), list.classList.add('-z-10'))
}
// dropdown

function toggleDropdown(event) {
    event.preventDefault();
    const dropdown = document.getElementById('dropdown');
    dropdown.classList.toggle('hidden');
}

function dropdownFooter(event) {
    event.preventDefault();
    const drop = document.getElementById('dropdown-footer');
    drop.classList.toggle('hidden')
    // console.log(dropdown);
}

// const drop = document.getElementById('dropdown-footer')
// console.log(drop);

window.addEventListener('scroll', function () {
    const up = document.getElementById('up-button');
    if (window.scrollY > 200) {
        up.classList.remove('hidden')
    } else {
        up.classList.add('hidden')
    }
})

// password
function eye() {
    const icon = document.getElementById('icon')
    const OpenEye = icon.classList.contains('fa-eye')
    const closeEye = icon.classList.contains('fa-eye-slash')
    const eyes = document.getElementById('password')
    if (closeEye) {
        eyes.type = 'text'
        icon.classList.remove('fa-eye-slash')
        icon.classList.add('fa-eye')
    } else if (OpenEye) {
        eyes.type = 'password'
        icon.classList.remove('fa-eye')
        icon.classList.add('fa-eye-slash')
    }
}