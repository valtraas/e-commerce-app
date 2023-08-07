const dark = document.getElementById('sun')
const mode = dark.classList
const change = document.querySelector('html')
// console.log(change);
const isDark = localStorage.getItem('darkMode') === 'true'
if (isDark) {
    mode.remove('fa-sun');
    mode.add('fa-moon');
    change.classList.add('dark');
}
function DarkMode() {
    if (mode.contains('fa-sun')) {
        mode.remove('fa-sun');
        mode.add('fa-moon');
        change.classList.add('dark');
        mode.remove('text-orange-500');
        localStorage.setItem('darkMode', 'true');
    } else {
        mode.remove('fa-moon');
        mode.add('fa-sun');
        change.classList.remove('dark');
        mode.add('text-orange-500');
        localStorage.setItem('darkMode', 'false');
    }
}
function SideDown(event) {
    event.preventDefault();
    const dropdown = document.getElementById('dropdown');
    dropdown.classList.toggle('hidden');
}
