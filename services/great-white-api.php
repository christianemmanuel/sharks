<script>
  document.addEventListener('DOMContentLoaded', function() {
    const date = new Date();
    const current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
    
    fetch(`https://billiards.luckytaya.com/api/event/info/${current_date}`)
      .then(response => response.json())
      .then(data => {
        
        // FOR GRREAT WHITE ARENA
        const arenaInfo = data.filter(e => e.arenaName === 'GREAT WHITE ARENA');

        // console.log(arenaInfo)
        
        let ul = document.querySelector('#eventInfo ul');
        let gameTitle = document.getElementById('game-title');
        let gameDate = document.getElementById('game-date');
        let gamePlayers = document.getElementById('game-players');

        const grateWhiteDate = new Date(arenaInfo[0].eventTime.date).toLocaleDateString('en-US', {
          month: 'long',
          day: 'numeric',
          year: 'numeric'
        });
        
        if(ul == null) {
          return false
        } else {
          ul.innerHTML = `<li>
          <p>Game Schedule</p>
            <h5>${grateWhiteDate}</h5>
          </li>`
          
          arenaInfo.forEach(schedules => {
            ul.innerHTML += `
              <li class=${schedules.status === 1 ? "live-now" : ""}>
                <h4>${schedules.shortName}</h4>
                ${schedules.status === 1 ? `<div class="live-badge">
                  Live <i class="icon icon-circle"></i>
                </div>` : ''}
                
                <p>${schedules.arenaDescription}</p>
              </li>
            `
            gameTitle.innerHTML += `${schedules.status === 1 ? schedules.shortName : ''}`
            gameDate.innerHTML += ` ${schedules.status === 1 ? grateWhiteDate : ''} `

            if(schedules.status === 1) {
              schedules.sharks.map(function (e) {
                gamePlayers.innerHTML += `<p>${e.name}</p>`
              })
            }

          })
        }
        
        
      })
      .catch(error => {
        console.error(error);
      });
  })
</script>