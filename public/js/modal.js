const openModal = document.getElementById('create_btn');
const modal = document.getElementById('modal');
const closeModal = document.getElementById('close_modal_btn');

openModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.add('modal--show');
});

closeModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.remove('modal--show');
})