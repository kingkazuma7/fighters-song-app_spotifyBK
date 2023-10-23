fetch('https://accounts.spotify.com/api/token', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded',
    'Authorization': 'Basic ' + btoa('0c8691af790e449e93d0965f5f79c27f' + ':' + '4c2cf50477a8482c82c14ce5f20cc37f')
  },
  body: 'grant_type=client_credentials'
})
.then(response => response.json())
.then(data => {
  const token = data.access_token;
  window.spotifyToken = token;

  return fetch('https://api.spotify.com/v1/search?q=Scars&type=track', {
    headers: {
      'Authorization': 'Bearer ' + window.spotifyToken
    }
  });
})
.then(response => response.json())
.then(data => {
  // 検索結果を表示します。
  console.log(data);
})
.catch(error => console.error('Error:', error));
