
const searchIcon = document.querySelector(".search-icon");
const searchContainer = document.querySelector(".search-container");

searchIcon.addEventListener("click", () => {
    searchContainer.classList.toggle("active");
});
function openSide(){
    const hellos = document.querySelector(".yetam");
    hellos.style.display = 'flex';

}

function closeSide(){
    hellos.style.display='none';
}
