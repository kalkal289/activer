//textareaの高さを自動調整
const textareas = document.getElementsByTagName('textarea');

Array.prototype.forEach.call(textareas, textarea => {
    const clientHeight = textarea.clientHeight;
    
    textarea.addEventListener('input', ()=>{
        textarea.style.height = clientHeight + 'px';
        const scrollHeight = textarea.scrollHeight;
        textarea.style.height = scrollHeight + 'px';
    });
})
