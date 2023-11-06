//検索キーワードにタグがあった場合、リンク色に変換
window.onload = function() {
    let searchText = document.getElementById('search-text');
    let text = String(searchText.value);
    let newText = text.replace(/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/g, '<span class="text-[#1d9bf0]">$&</span>');
    searchText.textContente = newText;
}