




document.addEventListener("DOMContentLoaded", function () {
    const upButton = document.getElementById("up-button");
    const menu = document.getElementById("menu");
    const navigation = document.getElementById('navigation')
    console.log(navigation.parentNode);
    upButton.addEventListener("click", function (event) {

        if (menu.classList.contains('hidden') || navigation.classList.contains('fa-circle')) {
            menu.classList.remove('hidden')
            menu.classList.add('flex')
            menu.classList.add('mb-3')
            navigation.classList.remove('fa-circle')
            navigation.classList.add('fa-x')
            navigation.parentNode.classList.remove('bg-white')
            navigation.parentNode.classList.add('bg-active')
            navigation.parentNode.classList.add('text-white')

        } else {
            menu.classList.remove('flex');
            menu.classList.add('hidden')
            navigation.classList.remove('fa-x')
            navigation.classList.add('fa-circle')
            navigation.parentNode.classList.remove('bg-active')
            navigation.parentNode.classList.add('bg-white')
            navigation.parentNode.classList.remove('text-white')
        }
    });
});