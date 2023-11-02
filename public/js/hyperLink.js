let content = document.getElementById('post-content');
content.addEventListener('keyup', () => {
    let contentValue = content.value;
    let urls = contentValue.match(/^https?:\/\/[\w/:%#\$&\?\(\)~\.=\+\-]+$/);
    let changedValue = contentValue.replace(/^https?:\/\/[\w/:%#\$&\?\(\)~\.=\+\-]+$/, '<span class="text-blue-500">' + urls + '</span>');
    content.value = changedValue;
});