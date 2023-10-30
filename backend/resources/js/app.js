import { fetchTracks } from "./api";

fetchTracks().then(tracks => {
  // 検索結果をHTMLに表示します。
  const tracksList = document.getElementById('tracks');
  tracks.forEach(track => {
    const listItem = document.createElement('li');
    listItem.textContent = `${track.name} by ${track.artists[0].name}`;
    tracksList.appendChild(listItem);
  });
});