const cliendId = process.env.SPOTIFY_CLIENT_ID;
const clientSecret = process.env.SPOTIFY_CLIENT_SECRET;

export function fetchTracks() {
  return fetch('https://accounts.spotify.com/api/token', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
      'Accept':'application/json',
      'Authorization': 'Basic ' + btoa(cliendId + ':' + clientSecret)
    },
    body: 'grant_type=client_credentials'
  })
  .then(response => response.json())
  .then(data => {
    const token = data.access_token;
    return fetch('https://api.spotify.com/v1/search?q=Scars&type=track', {
      headers: {
        'Authorization': 'Bearer ' + token
      }
    });
  })
  .then(response => response.json())
  .then(data => data.tracks.items)
  .catch(error => console.error('Error:', error));
}