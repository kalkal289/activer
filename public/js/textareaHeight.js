//textareaの高さを自動調整
const textarea = document.getElementById('content');
const clientHeight = textarea.clientHeight;

textarea.addEventListener('input', ()=>{
    textarea.style.height = clientHeight + 'px';
    const scrollHeight = textarea.scrollHeight;
    textarea.style.height = scrollHeight + 'px';
});