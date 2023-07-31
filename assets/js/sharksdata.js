document.addEventListener('DOMContentLoaded', function() {
  const date = new Date();
  const current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ (date.getDate());
  const yesterdate = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ (date.getDate()-1);

  const startTime = performance.now();

  function fetchMatchResults(date, containerClass) {
    fetch(`https://billiards.luckytaya.com/api/event/info/${date}`)
    .then(response => response.json())
    .then(data => {

      // calculate data loading time
      const endTime = performance.now();
      const loadingTime = endTime - startTime;

      const arenaData = data.filter(e => e.status === 2 && e.enableTrifecta !== true);
      const trifectaData = data.filter(e => e.status === 2 && e.enableTrifecta === true)
      
      if (arenaData.length > 0 && arenaData[0].eventTime !== null && arenaData[0].eventTime.date !== null) {
        const matchResultDate = new Date(arenaData[0].eventTime.date).toLocaleDateString('en-US', {
          month: 'long',
          day: 'numeric',
          year: 'numeric'
        });
  
        console.log(matchResultDate)
  
        trifectaData.forEach(trifecta => {
          const sharks = trifecta.sharks;
          const highestThreeWins = sharks
          .sort((a, b) => b.wins - a.wins || (a.dateLastWin !== null ? new Date(a.dateLastWin.date) : 0) - (b.dateLastWin !== null ? new Date(b.dateLastWin.date) : 0))
            .slice(0, 3)
            .map(shark => shark.sequence);
  
          highestThreeWins.forEach(shark => {
            setTimeout(() => {
              document.querySelector(containerClass).innerHTML += `<li>${shark}</li>`;
            }, 0);
          });
  
          const highestWin = sharks.reduce((highest, shark) => shark.wins > highest.wins ? shark : highest);
  
          const resultContainer = document.getElementById('match-results');
          resultContainer.innerHTML += `
            <div class="match-result-item">
              <div class="match-result-info">
                <div class="match-result-heading">
                  <div class="arena">
                    <p>${trifecta.arenaName}</p>
                    <p>${matchResultDate}</p>
                  </div>
                  <h4>${trifecta.shortName} <br> <span>Winner</span></h4>
                </div>
                <h3>${highestWin.name}</h3>
                <ul class="match-trifecta ${containerClass.slice(1)}"></ul>
              </div>
            </div>`;
        });
  
        arenaData.forEach(winner => {
          const sharks = winner.sharks;
          const highestWin = sharks.reduce((highest, shark) => shark.wins > highest.wins ? shark : highest);
          const resultContainer = document.getElementById('match-results');
          resultContainer.innerHTML += `
          <div class="match-result-item">
            <div class="match-result-info">
              <div class="match-result-heading">
                <div class="arena">
                  <p>${winner.arenaName}</p>
                  <p>${matchResultDate}</p>
                </div>
                <h4>${winner.shortName} <br> <span>Winner</span></h4>
              </div>
              <h3>${highestWin.name}</h3>
              <ul>
                <li>Race to ${winner.maxWins}</li>
              </ul>
            </div>
          </div>`;
        });
        
        // Initialize slick.js slider 
        setTimeout(() => {
          function createSlick() {
            $('.match-results-list').not('.slick-initialized').slick({
              cssEase: 'linear',
              dots: true,
              variableWidth: true,
              arrows: false,
              slidesToShow: 3,
              slidesToScroll: 2,
              draggable: true,
              infinite: false,
              autoplay: false,
              speed: 300,
              responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    variableWidth: false,
                  }
                },
                {
                  breakpoint: 576,
                  settings: {
                    variableWidth: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  }
                }
              ]
            });
          }
          
          createSlick();
          $(window).on('resize', createSlick);
          
          // Remove empty state after fetching data on UI.
          $('.empty-match-results').remove();
          $("#match-results").css("display", "block");
  
          // To make make all the cards same height on UI, I calculate the height and put on the css.
          const resultsCardHeight = Math.max(...$('.match-result-item').map(function() { return $(this).height(); }));
          const resultsTitleHeight = Math.max(...$('.match-result-item h4').map(function() { return $(this).height(); }));
          $(".match-result-info").css("min-height", resultsCardHeight);
          $(".match-result-info h4").css("min-height", resultsTitleHeight);
        }, loadingTime);
      }

    })
    .catch(error => {
      console.error(error);
    });
  }

  // Initialize today and yesterday match results.
  fetchMatchResults(current_date, '.trifecta-today');
  fetchMatchResults(yesterdate, '.trifecta-yesterday');
});
